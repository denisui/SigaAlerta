<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class General {
    /*
     * Remove Accents
     * Remove os acentos das strings
     * @param $string
     */

    public function remove_accents($string) {
        return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç)/", "/(Ç)/"), explode(" ", "a A e E i I o O u U n N c C"), $string);
    }

    /*
     * Método para converter valores para EN antes de enviar pro banco, e  converter para BR depois que pegar do banco.
     * Ex: convertCoin("EN",2,$xValue); // $value = 123456.78
     * convertCoin("BR",2,$xValue); // 123.456,78
     *
     * $xCoin = Padrao da moeda (EN ou BR)
     * $xDecimal = Casa Decimal (0,1,2,3...)
     * $xValue = Valor pego do Input
     *
     */

    public function convert_coin($xCoin = "EN", $xDecimal = 2, $xValue) {
        $xValue = preg_replace('/[^0-9]/', '', $xValue); // Deixa apenas números
        $xNewValue = substr($xValue, 0, -$xDecimal); // Separando número para adição do ponto separador de decimais
        $xNewValue = ($xDecimal > 0) ? $xNewValue . "." . substr($xValue, strlen($xNewValue), strlen($xValue)) : $xValue;
        return $xCoin == "EN" ? number_format($xNewValue, $xDecimal, '.', '') : ($xCoin == "BR" ? number_format($xNewValue, $xDecimal, ',', '.') : NULL);
    }

    /*
     * Normaliza a URL
     */

    public function normalizeURL($str) {
        $str = strtolower(utf8_decode($str));
        $i = 1;
        $str = strtr($str, utf8_decode('àáâãäåæçèéêëìíîïñòóôõöøùúûýýÿ'), 'aaaaaaaceeeeiiiinoooooouuuyyy');
        $str = preg_replace("/([^a-z0-9])/", '-', utf8_encode($str));
        while ($i > 0)
            $str = str_replace('--', '-', $str, $i);
        if (substr($str, -1) == '-')
            $str = substr($str, 0, -1);
        return $str;
    }

    public function formatDateMysql($str) {
        $date = strtotime($str);
        $newformat = date('Y-m-d', $date);
        return $newformat;
    }
}
