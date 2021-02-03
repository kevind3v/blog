<?php

namespace Src\Helpers;

class Message
{
    private $text;
    private $type;

    public function __toString(): string
    {
        return $this->render();
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    public function info(string $message): Message
    {
        $this->type = 'info';
        $this->text = $this->filter($message);
        return $this;
    }
    public function warning(string $message): Message
    {
        $this->type = 'warning';
        $this->text = $this->filter($message);
        return $this;
    }
    public function error(string $message): Message
    {
        $this->type = 'error';
        $this->text = $this->filter($message);
        return $this;
    }
    public function success(string $message): Message
    {
        $this->type = 'success';
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return "<div class='message {$this->getType()}'>{$this->icon()}{$this->getText()}</div>";
    }

    public function icon(): string
    {
        switch ($this->type) {
            case 'info':
                return '<i class="fas fa-exclamation-circle mr-1"></i>';
                break;
            case 'error':
                return '<i class="fas fa-ban mr-1"></i>';
                break;
            case 'success':
                return '<i class="fas fa-check mr-1"></i>';
                break;
            case 'warning':
            default:
                return '<i class="fas fa-exclamation-triangle mr-1"></i>';
                break;
        }
    }

    /**
     * @param string $message
     * @param string $type
     * @param string $redirect
     * @return Session
     */
    public function flash(string $message, string $type = "error", string $redirect = ""): Session
    {
        return (new Session())->set("flash", [
            "message" => $message,
            "type" => $type,
            "url" => $redirect
        ]);
    }

    /**
     * Filtrar a mensagem
     * @param string $message
     * @return string
     */
    private function filter(string $message): string
    {
        return filter_var($message, FILTER_SANITIZE_SPECIAL_CHARS);
    }
}
