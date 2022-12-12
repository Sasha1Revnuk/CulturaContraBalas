<?php

namespace App\Traits;

use App\Models\CustomMedia;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;


trait Mediaable
{

    /**
     * @param $uploadedPhotos - масив або одне фото
     * @param $url - id, slug, 'public/productImages/' . $model->id, etc
     * @param bool $deleteOld - true ( видалення всіх інших зображень з заданим ключем), false (без видалення)
     * @param $key - Ключ який групує зображення для моделі. Якщо не задати - буде 0
     * @param bool $needOptimize true (потрібна оптимізація), false (не потрібна оптимізація)
     * @param array $resize - ширина, висота. Можна задати щось одне
     * @param $alt - альт для зображень
     * @return void
     */

    public function saveFile(
        $uploadedPhotos,
        $url,
        bool $deleteOld = false,
        $key = '0',
        bool $needOptimize = false,
        array $resize = [],
        $alt = null
    ) {
        $medias = $this->mediasByKey($key); // отримання зображень по ключу

        if ($deleteOld) {
            foreach ($medias as $media) {
                $this->remove($media);
            }
        }

        if (!empty($resize) && isset($resize[1]) == false) {
            $resize[1] = null;
        }

        $this->uploadPhotos($uploadedPhotos, $this->photoPathMediable . $url, $key, $needOptimize, $resize, $alt);
    }

    /**
     * Метод для того, щоб юзати ззовні для видалення зображень
     * @param CustomMedia $media
     * @return void
     */
    public function removeFile(CustomMedia $media)
    {
        $this->remove($media);
    }


    /**
     * Видалення зображення
     * @param $media
     * @return void
     */
    private function remove($media)
    {
        if ($media) {
            $this->getStorage()->delete(str_replace('/storage', 'public', $media->url));
            $media->delete();
        }
    }

    /**
     * Завантаження фото
     * @param $uploadedPhotos
     * @param $url
     * @param $key
     * @param bool $needOptimize
     * @param array $resize
     * @param $alt
     * @return void
     */
    private function uploadPhotos($uploadedPhotos, $url, $key, bool $needOptimize, array $resize, $alt)
    {
        if (!$uploadedPhotos) {
            return;
        }

        if (!is_iterable($uploadedPhotos)) {
            $this->storePhottableFile($uploadedPhotos, $url, $key, $needOptimize, $resize, $alt);

            return;
        }

        foreach ($uploadedPhotos as $photo) {
            $this->storePhottableFile($photo, $url, $key, $needOptimize, $resize, $alt);
        }
    }


    /**
     * Збереження зображення
     * @param $uploadedPhoto
     * @param $url
     * @param $key
     * @param bool $needOptimize
     * @param array $resize
     * @param $alt
     * @return void
     */
    private function storePhottableFile($uploadedPhoto, $url, $key, bool $needOptimize, array $resize, $alt)
    {
        $fileName = $this->uploadFile($url, $uploadedPhoto);
        $fileData = [
            'url' => $this->getStorage()->url($url . '/' . $fileName),
            'path' => $fileName,
            'key' => $key ?? null,
            'alt' => $alt,
        ];
        $media = $this->medias()->create($fileData); // Запис в таблицю medias

        if ($needOptimize || !empty($resize)) { // Якщо треба оптимізацію
            $img = \Image::make(public_path($media->url));

            if (!empty($resize)) { // Якщо вказані розміри - оптимізація за заданими розмірами
                [$width, $heigth] = $resize;
                $img->resize($width, $heigth, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save(public_path($media->url), 85);
            } else { // Загальна оптимізація
                if ($needOptimize) {
                    $img->save(public_path($media->url), 85);
                }
            }
        }
    }


    /**
     * Збереження файлу в сторейдж
     * @param $url
     * @param UploadedFile $originalImage
     * @return string
     */
    private function uploadFile($url, UploadedFile $originalImage): string
    {
        $fileExtension = $this->getFileExtension($originalImage);
        $newFileName = $this->generateFileName($fileExtension);

        $this->getStorage()->putFileAs(('/' . $url), $originalImage, $newFileName);

        return $newFileName;
    }

    /**
     * Отримання розширення зображення
     * @param UploadedFile $uploadedFile
     * @return string
     */
    private function getFileExtension(UploadedFile $uploadedFile)
    {
        return $uploadedFile->getClientOriginalExtension();
    }

    /**
     * Генерація імені файлу
     * @param $fileExtension
     * @return string
     */
    private function generateFileName($fileExtension)
    {
        $rnd = Str::random(5);

        return sprintf('%s_%d.%s', $rnd, time(), $fileExtension);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|mixed
     */
    private function getStorage()
    {
        return resolve(Filesystem::class);
    }


    /**
     * Поліморфний звязок
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function medias()
    {
        return $this->morphMany(CustomMedia::class, 'mediaAble')->orderBy('range');
    }


    /**
     * Вибірка по ключу для використанні в запитах
     * @param $key
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function mediasByKeyForQuery($key)
    {
        return $this->medias()->where('key', $key);
    }


    /**
     * Кінцева вибірка моделей
     * @param $key
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function mediasByKey($key)
    {
        return $this->mediasByKeyForQuery($key)->get();
    }


    /**
     * Вибірка по ключу для використанні в запитах вже підгружених (треба в моделі юзати $with=['medias'])
     * @param $key
     * @return mixed
     */
    public function loadMediasByKeyForQuery($key)
    {
        return $this->medias->where('key', $key);
    }


    /**
     * Кінцева вибірка моделей вже підгружених (треба в моделі юзати $with=['medias'])
     * @param $key
     * @return mixed
     */
    public function loadMediasByKey($key)
    {
        return $this->loadMediasByKeyForQuery($key);
    }


    /**
     * Отримання посилання на зображення
     * @param CustomMedia|null $media
     * @return mixed|null
     */
    public function getUrl(CustomMedia $media = null)
    {
        return $media ? $media->url : null;
    }

    /**
     * Отримання alt для зображення
     * @param CustomMedia|null $media
     * @return mixed|null
     */
    public function getAlt(CustomMedia $media = null)
    {
        return $media ? $media->alt : null;
    }

    /**
     * Отримання першого
     * @param $key
     * @return mixed
     */
    public function loadGetFirst($key = "0")
    {
        return $this->loadMediasByKeyForQuery($key)->first();
    }

}
