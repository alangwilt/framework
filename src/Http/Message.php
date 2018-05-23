<?php

namespace Alan\Http;

class Message implements \Psr\Http\Message\MessageInterface
{
    protected $protocol;
    protected $headers;
    protected $body;

    public function __construct(String $protocol, $headers)
    {
        $this->protocol = $protocol;
        $this->headers = $headers;
    }

    public function getProtocolVersion()
    {
        return $this->protocol;
    }

    public function withProtocolVersion($version)
    {
        return new Message($version, $this->headers);
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function hasHeader($name)
    {
        return in_array($name, array_keys($this->headers));
    }

    public function getHeader($name)
    {
        return $this->headers[$name] ?: [];
    }

    public function getHeaderLine($name)
    {
        return implode(',', $this->headers[$name]) ?: '';
    }

    public function withHeader($name, $value)
    {
        $newHeaders = $this->headers;

        $newHeaders[$name] = $value;

        return new Message($this->protocol, $newHeaders);
    }

    public function withAddedHeader($name, $value)
    {
        $newHeaders = $this->headers;

        if (is_array($value)) {
            foreach ($value as $v) {
                array_push($newHeaders[$name], $v);
            }
        } else {
            array_push($newHeaders[$name], $value);
        }

        return new Message($this->protocol, $newHeaders);
    }

    public function withoutHeader($name)
    {

    }

    public function getBody()
    {

    }

    public function withBody(\Psr\Http\Message\StreamInterface $body)
    {
        
    }
}
