<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Поле :attribute повинне бути прийнятим.',
    'active_url' => 'Поле :attribute не є дійсним посиланням.',
    'after' => 'Поле :attribute повинно бути датою після :date.',
    'after_or_equal' => 'Поле :attribute повинно бути датою після або рівною :date.',
    'alpha' => 'Поле :attribute може містити тільки символи.',
    'alpha_dash' => 'Поле :attribute може містити тільки символи, цифри, тире і підкреслення.',
    'alpha_num' => 'Поле :attribute може містити тільки символи і цифри.',
    'array' => 'Поле :attribute повинно бути масивом.',
    'before' => 'Поле :attribute повинно бути датою до :date.',
    'before_or_equal' => 'Поле :attribute повинно бути датою до або рівною :date.',
    'between' => [
        'numeric' => 'Значення :attribute повинно бути між :min і :max.',
        'file' => 'Файл :attribute повинен мати розмір між :min і :max кілобайт.',
        'string' => 'Поле :attribute повинно містити між :min і :max символів.',
        'array' => 'Масив :attribute повинен містити між :min і :max елементів.',
    ],
    'boolean' => 'Поле :attribute може бути true або false.',
    'confirmed' => 'Поле :attribute не співпадає.',
    'date' => 'Поле :attribute не є у форматі дати.',
    'date_equals' => 'Поле :attribute повинно бути датою рівною :date.',
    'date_format' => 'Поле :attribute не відповідає формату дати :format.',
    'different' => 'Поле :attribute і :other повинно відрізнятись.',
    'digits' => 'Поле :attribute повинне містити :digits цифр.',
    'digits_between' => 'Поле :attribute повинно містити від :min до :max символів.',
    'dimensions' => 'Поле :attribute має недійсні розміри зображення.',
    'distinct' => 'Поле :attribute має значення, яке повторюється.',
    'email' => 'Поле :attribute повинно бути дійсною електронною адресою.',
    'ends_with' => 'Поле :attribute повинно закінчуватись одним з наступних: :values.',
    'exists' => 'Обраний :attribute є недійсним.',
    'file' => 'Поле :attribute повинно бути файлом.',
    'filled' => 'Поле :attribute повинно мати значення.',
    'gt' => [
        'numeric' => 'Значення :attribute повинно бути більшим ніж :value.',
        'file' => 'Файл :attribute повинен бути більшим ніж :value кілобайт.',
        'string' => 'Поле :attribute повинно містити більше ніж :value символів.',
        'array' => 'Масив :attribute повинен містити більше ніж :value елементів.',
    ],
    'gte' => [
        'numeric' => 'Значення :attribute повинно бути більшим або рівним :value.',
        'file' => 'Файл :attribute повинен бути більшим або рівним :value кілобайт.',
        'string' => 'Поле :attribute повинно містити більше або рівно :value символів.',
        'array' => 'Масив :attribute повинен містити :value елементів або більше.',
    ],
    'image' => 'Поле :attribute повинно бути зображенням.',
    'in' => 'Обране поле :attribute є недійсним.',
    'in_array' => 'Поле :attribute не існує в :other.',
    'integer' => 'Поле :attribute повинно бути цілим числом.',
    'ip' => 'Поле :attribute повинно бути a valid IP address.',
    'ipv4' => 'Поле :attribute повинно бути дійсною IPv4 адресою.',
    'ipv6' => 'Поле :attribute повинно бути дійсною IPv6 адресою.',
    'json' => 'Поле :attribute повинно бути дійсною JSON стрічкою.',
    'lt' => [
        'numeric' => 'Значення :attribute повинно бути меншим ніж :value.',
        'file' => 'Файл :attribute повинен бути меншим ніж :value кілобайт.',
        'string' => 'Поле :attribute повинно бути меншим ніж :value символів.',
        'array' => 'Масив :attribute повинен містити менше ніж :value елементів.',
    ],
    //
    'lte' => [
        'numeric' => 'Значення :attribute повинно бути меншим або рівним :value.',
        'file' => 'Файл :attribute повинен бути меншим або рівним :value кілобайт.',
        'string' => 'Поле :attribute повинно бути меншим або рівним :value символів.',
        'array' => 'Масив :attribute не повинен містити більше ніж :value елементів.',
    ],
    'max' => [
        'numeric' => 'Значення :attribute не повинно бути більшим ніж :max.',
        'file' => 'Файл :attribute не повинен бути більшим ніж :max кілобайт.',
        'string' => 'Поле :attribute не повинно бути більшим ніж :max символів.',
        'array' => 'Масив :attribute не повинен містити більше ніж :max елементів.',
    ],
    'mimes' => 'Значення :attribute повинно бути файлом типу: :values.',
    'mimetypes' => 'Значення :attribute повинно бути файлом типу: :values.',
    'min' => [
        'numeric' => 'Значення :attribute повинно бути не меншим ніж :min.',
        'file' => 'Файл :attribute повинен бути не меншим ніж :min кілобайт.',
        'string' => 'Поле :attribute повинно бути не меншим ніж :min символів.',
        'array' => 'Масив :attribute повинен містити не менше ніж :min елементів.',
    ],
    'multiple_of' => 'Значення :attribute повинно бути кратним :value',
    'not_in' => 'Обране поле :attribute є недійсним.',
    'not_regex' => 'Поле :attribute недійсного формату.',
    'numeric' => 'Поле :attribute повинно бути числом.',
    'password' => 'Пароль неправильний.',
    'present' => 'Поле :attribute повинно бути присутнім.',
    'regex' => 'Поле :attribute недійсного формату.',
    'required' => 'Поле ":attribute" є обов\'язковим',
    'required_if' => 'Поле :attribute є обов\'язковим коли :other є :value.',
    'required_unless' => 'Поле :attribute є обов\'язковим поки :other є в :values.',
    'required_with' => 'Поле :attribute є обов\'язковим коли :values є присутнім.',
    'required_with_all' => 'Поле :attribute є обов\'язковим коли :values є присутніми.',
    'required_without' => 'Поле :attribute є обов\'язковим коли :values не є присутнім.',
    'required_without_all' => 'Поле :attribute є обов\'язковим коли жодні з :values не є присутніми.',
    'same' => 'Поле :attribute і :other повинно співпадати.',
    'size' => [
        'numeric' => 'Значення :attribute повинно бути розміру :size.',
        'file' => 'Файл :attribute повинен бути розміру :size кілобайт.',
        'string' => 'Поле :attribute повинне бути розміру :size символів.',
        'array' => 'Масив :attribute повинен бути розміру :size елементів.',
    ],
    'starts_with' => 'Значення :attribute повинно починатись одною з наступних величин: :values.',
    'string' => 'Поле :attribute повинно бути стрічкою.',
    'timezone' => 'Значення :attribute повинно бути дійсним часовим поясом.',
    'unique' => 'Значення :attribute вже зайнято.',
    'uploaded' => 'Значення :attribute не вдалось завантажити.',
    'url' => 'Значення :attribute недійсного формату.',
    'uuid' => 'Значення :attribute повинно бути дійсним UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
