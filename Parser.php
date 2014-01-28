<?php

namespace FRNK\CronExpressionParserBundle;
use Cron\CronExpression;
use Cron\FieldFactory;

class Parser {
 protected $cronExpressionParser=null;
 protected $expression;


	public function setExpression ($expression) {
		$this->cronExpressionParser = new CronExpression ($expression , new FieldFactory());
	}


	public function setPart($position, $value){
		if ($this->checkParser()) {
			return $this->cronExpressionParser->setPart($position, $value);
		}
	}

	public function getNextRunDate($currentTime = 'now', $nth = 0, $allowCurrentDate = false){
		if ($this->checkParser()) {
			return $this->cronExpressionParser->getNextRunDate($currentTime,$nth,$allowCurrentDate);
		}
	}

	public function getPreviousRunDate($currentTime = 'now', $nth = 0, $allowCurrentDate = false){
		if ($this->checkParser()) {
			return $this->cronExpressionParser->getPreviousRunDate($currentTime,$nth,$allowCurrentDate);
		}
	}

	public function isDue($currentTime = null) {
		if ($this->checkParser()) {
			return $this->cronExpressionParser->isDue($currentTime);
		}
	}

	protected function getRunDate($currentTime = null, $nth = 0, $invert = false, $allowCurrentDate = false){
		if ($this->checkParser()) {
			return $this->cronExpressionParser->getRunDate($currentTime,$nth, $invert, $allowCurrentDate);
		}
	}

	private function checkParser() {
		if (!$this->cronExpressionParser){
			throw new \Exception ("You need to call setExpression first");	
		}
		return true;
	}
}
