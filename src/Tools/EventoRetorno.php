<?php namespace PhpNFe\NFe\Tools;

use NFePHP\NFe\Tools;
use NFePHP\NFe\Complements;

class EventoRetorno extends Retorno
{
    /**
     * @var Tools
     */
    protected $tools;

    /**
     * XML da resposta.
     *
     * @var string
     */
    protected $xmlResponse;

    /**
     * XML da nfe assinada.
     *
     * @var string
     */
    protected $xmlAssigned;

    /**
     * XML protocolado.
     *
     * @var string
     */
    protected $xmlProtocoled;

    /**
     * AutorizaRetorno constructor.
     * @param string $response
     * @param string $xml
     */
    public function __construct($tools, $response, $xml)
    {
        $this->tools = $tools;
        $this->xmlResponse = $response;
        $this->xmlAssigned = $xml;

        $st = new \NFePHP\NFe\Common\Standardize();
        $this->response = $st->toStd($response);
    }

    /**
     * Retorna o código do retorno.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->getValue('retEvento.infEvento.cStat', '0');
    }

    /**
     * Retorna a mensagem de motivo do retorno.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->getValue('retEvento.infEvento.xMotivo', '');
    }

    /**
     * Retorna se o retorno é um erro.
     *
     * @return bool
     */
    public function isError()
    {
        return $this->getCode() != '135';
    }

    /**
     * Retorna a chave de 44 caracteres da nfe.
     *
     * @return string
     */
    public function getChNFe()
    {
        return $this->getValue('retEvento.infEvento.chNFe', '');
    }

    /**
     * Retorna o numero do protocolo de autorizacao.
     *
     * @return string
     */
    public function getNProt()
    {
        return $this->getValue('retEvento.infEvento.nProt', '');
    }

    /**
     * Retorna o XML assinado e protocolado.
     *
     * @return string
     */
    public function getXML()
    {
        if ($this->isError()) {
            return '';
        }

        if (! is_null($this->xmlProtocoled)) {
            return $this->xmlProtocoled;
        }

        return $this->xmlProtocoled = Complements::toAuthorize($this->tools->lastRequest, $this->xmlResponse);
    }
}