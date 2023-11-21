<?php

class Mnb_Model
{
    private $client;

    public function __construct()
    {
        $this->client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");
    }

    public function devizak()
    {
        $ret = simplexml_load_string($this->client->GetCurrencies()->GetCurrenciesResult);
        $curr = $ret->Currencies->Curr;

        $result = [];

        foreach ($curr as $item)
        {
            $result[] = (string)$item;
        }

        return $result;
    }

    public function datumok()
    {
        $ret = simplexml_load_string($this->client->GetDateInterval()->GetDateIntervalResult);
        $startDate = $ret->DateInterval->attributes()->startdate;
        $endDate = $ret->DateInterval->attributes()->enddate;

        return [
            'startDate' => $startDate,
            'endDate'   => $endDate
        ];
    }

    public function arfolyam($datum, $deviza)
    {
        $ret = simplexml_load_string($this->client->GetExchangeRates([
            'startDate' => $datum,
            'endDate' => $datum,
            'currencyNames' => $deviza
        ])->GetExchangeRatesResult);

        if (isset($ret->Day[0])) {
            return [
                'date' => (string)$ret->Day[0]->attributes()->date,
                'rate' => floatval(str_replace(',', '.', str_replace('.', '', (string)$ret->Day[0]->Rate))),
            ];
        }

        return null;
    }

    public function arfolyamok($kezdo, $zaro, $deviza)
    {
        $ret = simplexml_load_string($this->client->GetExchangeRates([
            'startDate' => $kezdo,
            'endDate' => $zaro,
            'currencyNames' => $deviza
        ])->GetExchangeRatesResult);

        $result = [];

        if (isset($ret->Day)) {
            foreach ($ret->Day as $item) {
                $result[] = [
                    'date' => (string)$item->attributes()->date,
                    'rate' => floatval(str_replace(',', '.', str_replace('.', '', (string)$item->Rate))),
                ];
            }
        }

        return array_reverse($result);
    }
}

?>