<?php


namespace Happyr\ApiClient\Http\Response;

/**
 * Class Response
 *
 * This is the response class you get from the API
 */
class Response
{
    /**
     * @var integer code
     *
     * The HTTP response code
     */
    protected $code;

    /**
     * @var string body
     *
     * The body of the response
     */
    protected $body;

    /**
     * @var string format (xml or json)
     *
     */
    protected $format;

    /**
     * @param string $body
     * @param integer $code
     */
    public function __construct($body, $code)
    {
        $this->body = $body;
        $this->code = $code;
    }

    /**
     *
     * @param string $body
     *
     * @return $this
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     *
     * @param int $code
     *
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     *
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     *
     * @param string $format
     *
     * @return $this
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }
}