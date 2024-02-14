<?php
session_start();

class ABTest
{
    private $templates = [1, 2, 3];
    private const TOTAL_VIEWS_THRESHOLD = 100_000;

    public function __construct()
    {
        foreach ($this->templates as $template) {
            /**
             *  сбрасываем счетчик щаблонов по 0
             */
            if (!isset($_SESSION['template_counts'][$template])) {
                $_SESSION['template_counts'][$template] = 0;
            }
        }
    }

    public function chooseTemplate()
    {
        $leastShownTemplateId = $this->getLeastShownTemplateId();
        /**
         * Отслеживаем просмотр шаблона
         */
        $this->trackTemplateCount($leastShownTemplateId);

        /**
         * Выводим шаблон
         */
        $this->displayTemplate($leastShownTemplateId);
    }

    private function getLeastShownTemplateId()
    {
        /**
         * сортирует массив по значению, сохраняя ключи.
         *  с наименьшим количеством показов к шаблону с наибольшим количеством показов.
         */
        asort($_SESSION['template_counts']);
        reset($_SESSION['template_counts']);
        return key($_SESSION['template_counts']);
    }

    public function trackTemplateCount($templateId)
    {
        $_SESSION['template_counts'][$templateId]++;
        /**
         * Проверяем, если общее количество просмотров больше или равно TOTAL_VIEWS_THRESHOLD, то выводим результат
         */
        $totalViews = array_sum($_SESSION['template_counts']);
        if ($totalViews >= self::TOTAL_VIEWS_THRESHOLD) {
            $this->displayResults();
        }
    }

    private function displayResults()
    {
        /**
         * Рассчитываем проценты просмотров для каждого шаблона
         */
        $totalViews = array_sum($_SESSION['template_counts']);
        $templatePercentages = [];
        foreach ($this->templates as $template) {
            $templatePercentages[$template] = $_SESSION['template_counts'][$template] / $totalViews * 100;
        }

        /**
         * находим шаблон с максимальным процентом просмотров
         */
        $winningTemplate = array_search(max($templatePercentages), $templatePercentages);

        /**
         *  Отображаем наиболее эффективный шаблон
         */
        $this->displayTemplate($winningTemplate);

        /**
         * Отображаем сообщения
         */
        echo " <br> Наиболее эффективная страница {$winningTemplate} 
              <br> с эффективностью " . ' ' . round($templatePercentages[$winningTemplate], 2) . "%.";
    }

    public function displayTemplate($templateId)
    {
        include "templates/template{$templateId}.php";
    }
}

$abTest = new ABTest();
$abTest->chooseTemplate();
