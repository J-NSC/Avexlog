<?php

use Carbon\Carbon;

if (!function_exists('formatMoney')) {
    /**
     * Format a value as currency.
     *
     * @param mixed $value The numeric value to be formatted.
     * @param string $currency The currency code (default is 'BRL').
     * @param string $locale The locale for formatting (default is 'pt_BR').
     * @return string The formatted currency string.
     */
    function formatMoney($value, $currency = 'BRL', $locale = 'pt_BR')
    {
        if (!is_numeric(str_replace([',', '.'], '', $value))) {
            return 'R$ 0,00'; // Default for invalid values.
        }

        // Convert to float if it comes as a string with separators
        $value = floatval(str_replace(',', '.', str_replace('.', '', $value)));

        $formatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($value, $currency);
    }
}

if (!function_exists('getTurnTimeRange')) {
    /**
     * Retorna o intervalo de tempo de um turno baseado na data e no turno fornecidos.
     *
     * @param string $turn O turno ('breakfast', 'lunch', 'dinner').
     * @param string $date A data do turno no formato Y-m-d.
     * @return array Um array com os horários de início ('start') e fim ('end') do turno.
     */
    function getTurnTimeRange(string $turn, string $date): array
    {
        $parsedDate = Carbon::parse($date);

        return match ($turn) {
            'breakfast' => [
                'start' => $parsedDate->setTime(6, 0),
                'end' => $parsedDate->setTime(9, 0),
            ],
            'lunch' => [
                'start' => $parsedDate->setTime(12, 0),
                'end' => $parsedDate->setTime(15, 0),
            ],
            'dinner' => [
                'start' => $parsedDate->setTime(18, 0),
                'end' => $parsedDate->setTime(22, 0),
            ],
            default => ['start' => Carbon::now(), 'end' => Carbon::now()],
        };
    }
}
