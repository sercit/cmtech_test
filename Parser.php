<?php
/**
 * Page-Level DocBlock example.
 * @author Simon Rusin <semen.ubuntu@gmail.com>
 * @copyright Copyright (c) 2020, Simon Rusin
 */


/**
 * Class Parser
 *
 */
class Parser
{

    /**
     * @var null
     */
    private $url;
    /**
     * @var bool
     */
    private $unique;

    /**
     * Parser constructor.
     * @param null $url
     * @param bool $unique
     */
    public function __construct($url = null, $unique = true)
    {
        $this->url = $url;
        $this->unique = $unique;
        print_r($this->getUniquePairedTags());
    }

    /**
     * Return paired tags. Don't working with empty paired tags.
     *
     * @return array|null
     */
    private function getUniquePairedTags(): ?array
    {
        try {
            if (!$doc = DOMDocument::loadHTMLFile($this->url)) {
                throw new Exception('Load HTML Error');
            };
            foreach ($doc->getElementsByTagName('*') as $domElement) {
                if ($domElement->hasChildNodes())
                    $pairedNodes[] = $domElement->nodeName;
            }
            return $this->unique ? array_unique($pairedNodes) : $pairedNodes;
        } catch (Exception $e) {
            echo $e;
            return null;
        }

    }
}
