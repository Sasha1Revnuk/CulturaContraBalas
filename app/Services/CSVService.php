<?php

namespace App\Services;

class CSVService
{
    public function getDataFromCsvWithHeaders( $relativePath )
    {
        $data = [];
        $headers = [];
        if ( ( $handle = fopen( $relativePath, 'r' ) ) !== false ) {
            // BOM as a string for comparison.
            $bom = "\xef\xbb\xbf";
            // Progress file pointer and get first 3 characters to compare to the BOM string.
            if ( fgets( $handle, 4 ) !== $bom ) {
                // BOM not found - rewind pointer to start of file.
                rewind( $handle );
            }
            while ( ( $row = fgetcsv( $handle, 0, ';' ) ) !== false ) {
                if ( !count( $headers ) ) {
                    $headers = $row;
                } else {
                    $item = [];
                    foreach ( $headers as $key => $header ) {
                        $item[] = $row[$key];
                    }
                    $data[] = $item;
                }
            }
            fclose( $handle );
        }
        return $data;
    }

}
