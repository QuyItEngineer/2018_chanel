<?php
/**
 * Created by IntelliJ IDEA.
 * User: macintosh
 * Date: 3/29/18
 * Time: 3:13 PM
 */

namespace App\Exceptions;


use Exception;
use Throwable;

abstract class AppBaseException extends Exception
{
    protected $internalCode;

    const ERROR_STORY_SCRIPT_EXECUTE = "500001";

    public function __construct(int $internalCode = 400, string $message = null, Throwable $previous = null)
    {
        $this->internalCode = $internalCode;
        $code = $this->extractCodeFromInternalCode($internalCode);
        parent::__construct(
            $message
            ?? __('messages.error_message.' . $internalCode)
            ?? __('messages.error_message.500')
            , $code, $previous);
    }

    /**
     * @return int
     */
    public function getInternalCode(): int
    {
        return $this->internalCode;
    }

    /**
     * @param $internalCode
     * @author Lai Vu <vuldh@nal.vn>
     * @return string
     */
    private function extractCodeFromInternalCode($internalCode)
    {
        return strlen($internalCode) > 3 ? substr($internalCode, 0, 3) : $internalCode;
    }
}