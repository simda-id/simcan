<?php

namespace Elibyy\TCPDF;


class TCPDFHelper extends \TCPDF
{
    protected $headerCallback;

    protected $footerCallback;

    public function Header()
    {
        if ($this->headerCallback != null && is_callable($this->headerCallback)) {
            $cb = $this->headerCallback;
            $cb($this);
        } else {
            if (\config('tcpdf.use_original_header')) {
                parent::Header();
            }
        }
    }

    public function Footer()
    {
        if ($this->footerCallback != null && is_callable($this->footerCallback)) {
            $cb = $this->footerCallback;
            $cb($this);
        } else {
            if (\config('tcpdf.use_original_footer')) {
                parent::Footer();
            }
        }
    }

    public function setHeaderCallback($callback)
    {
        $this->headerCallback = $callback;
    }

    public function setFooterCallback($callback)
    {
        $this->footerCallback = $callback;
    }

    public function addTOC($page = '', $numbersfont = '', $filler = '.', $toc_name = 'TOC', $style = '', $color = array(0, 0, 0))
    {
        // sort bookmarks before generating the TOC
        parent::sortBookmarks();

        parent::addTOC($page, $numbersfont, $filler, $toc_name, $style, $color);
    }

    public function addHTMLTOC($page = '', $toc_name = 'TOC', $templates = array(), $correct_align = true, $style = '', $color = array(0, 0, 0))
    {
        // sort bookmarks before generating the TOC
        parent::sortBookmarks();

        parent::addHTMLTOC($page, $toc_name, $templates, $correct_align, $style, $color);
    }
}
