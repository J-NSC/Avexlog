<?php

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
