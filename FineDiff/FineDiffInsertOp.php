<?php

namespace Greywolfs\Bundle\FineDiffBundle\FineDiff;

class FineDiffInsertOp implements FineDiffOp
{
    /**
     * @var string
     */
    private $text;

    /**
     * FineDiffInsertOp constructor.
     * @param $text
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * @inheritdoc
     */
    public function getFromLen()
    {
        return 0;
    }

    /**
     * @inheritdoc
     */
    public function getToLen()
    {
        return strlen($this->text);
    }

    /**
     * @inheritdoc
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @inheritdoc
     */
    public function getOpcode()
    {
        $to_len = strlen($this->text);
        if ($to_len === 1) {
            return "i:{$this->text}";
        }
        return "i{$to_len}:{$this->text}";
    }
}