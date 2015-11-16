<?php
namespace Mimez\AlfredApp\Results;

class ResultsCollection
{
    /**
     * @var array of Result Items
     */
    protected $results = array();

    /**
     * @param Result $result
     *
     * @return ResultsCollection
     */
    public function add(Result $result)
    {
        $this->results[] = $result;

        return $this;
    }

    /**
     * @return array of Result items
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * Results as XML
     * @return \DOMDocument
     */
    public function getResultsAsDom()
    {
        $dom = new \DOMDocument();
        $dom->formatOutput = true;
        $root = $dom->createElement('items');
        $dom->appendChild($root);

        foreach ($this->getResults() as $result)
        {
            $item = $dom->createElement('item');

            foreach (array('title', 'subtitle', 'icon') as $node) {
                $value = $result->{"get" . ucfirst($node)}();
                $item->appendChild($dom->createElement($node, $value));
            }

            foreach (array('uid', 'arg', 'type') as $attribute) {
                $value = $result->{"get" . ucfirst($attribute)}();
                if ($value) {
                    $item->setAttribute($attribute, $value);
                }
            }

            foreach (array('autocomplete', 'valid') as $attribute) {
                $value = $result->{"is" . ucfirst($attribute)}() ? 'yes' : 'no';
                if ($value) {
                    $item->setAttribute($attribute, $value);
                }
            }

            $root->appendChild($item);
        }

        return $dom;
    }

    public function getResultsAsXml()
    {
        return $this->getResultsAsDom()->saveXML();
    }
}