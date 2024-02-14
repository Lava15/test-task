<?php

class Logger
{
    /**
     * Путь к файлу журнала
     */
    protected string $logFilePath;

    /**
     * Конструктор класса Logger.
     *
     * @param string $logFilePath Путь к файлу журнала.
     */
    public function __construct(string $logFilePath)
    {
        $this->logFilePath = $logFilePath;
    }

    /**
     * Запись информационного сообщения в журнал.
     *
     * @param string $message Сообщение для записи.
     */
    public function info(string $message): void
    {
        $this->writeLog('INFO', $message);
    }

    /**
     * Запись предупреждающего сообщения в журнал.
     *
     * @param string $message Сообщение для записи.
     */
    public function warning(string $message): void
    {
        $this->writeLog('WARNING', $message);
    }

    /**
     * Запись сообщения об ошибке в журнал.
     *
     * @param string $message Сообщение для записи.
     */
    public function error(string $message): void
    {
        $this->writeLog('ERROR', $message);
    }

    /**
     * Запись сообщения в файл журнала.
     *
     * @param string $level Уровень логирования.
     * @param string $message Сообщение для записи.
     */
    protected function writeLog(string $level, string $message): void
    {
        $time = date('Y-m-d H:i:s');
        $msg = "[$time] [$level] $message" . PHP_EOL;
        file_put_contents($this->logFilePath, $msg, FILE_APPEND);
    }
}

// Пример использования класса Logger
$logger = new Logger(__DIR__ . '/app.log');
$logger->info('Это информационное сообщение.');
$logger->warning('Это предупреждение.');
$logger->error('Это сообщение об ошибке.');
