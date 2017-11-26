<?php
class Calc
{
	protected $stackValue = 0;
	protected $status = '';
	protected $displayValue = 0;
	protected $pushedValue = 0;
	protected $isPushedBeforeSymbol = 0;
	protected $isError = 'hide';
	protected $category = '';

	protected $maxLength = 10;

	protected $symbols = array(
		'＋' => '+',
		'−' => '-',
		'×' => '*',
		'÷' => '/',
	);


	/**
	 * @return string
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * @return int
	 */
	public function getDisplayValue()
	{
		return $this->displayValue;
	}

	/**
	 * @return int
	 */
	public function getPushedValue()
	{
		return $this->pushedValue;
	}

	/**
	 * @return int
	 */
	public function getIsPushedBeforeSymbol()
	{
		return $this->isPushedBeforeSymbol;
	}

	/**
	 * @return string
	 */
	public function getIsError()
	{
		return $this->isError;
	}

	/**
	 * @return int
	 */
	public function getMaxLength()
	{
		return $this->maxLength;
	}

	/**
	 * @return array
	 */
	public function getSymbols()
	{
		return $this->symbols;
	}

	/**
	 * @return int
	 */
	public function getStackValue()
	{
		return $this->stackValue;
	}

	/**
	 * @return string
	 */
	public function getCategory()
	{
		return $this->category;
	}


	/**
	 * 初期化処理
	 * @throws Exception
	 */
	function init(){
		// 表示されている液晶の値を格納
		if (!empty($_POST['display'])) {
			$this->displayValue = $_POST['display'];
		}

		if (!empty($_POST['isPushedBeforeSymbol'])) {
			$this->isPushedBeforeSymbol = $_POST['isPushedBeforeSymbol'];
		}

		if (!empty($_POST['stack'])) {
			$this->stackValue = $_POST['stack'];
		}

		if (!empty($_POST['status'])) {
			$this->status = $_POST['status'];
		}

		//ボタンが押されたか
		if (isset($_POST['pushed'])) {
			$this->pushedValue = $_POST['pushed'];
		} else {
			throw new Exception("えらーでっせ");
		}
	}



	function main()
	{
		// POST判定
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$this->init();

			// カテゴリー検出
			if (isset($_POST['category'])) {
				$this->category = $_POST['category'];

				if ($this->category == 'clear') {
					if ($this->pushedValue == 'C') {

					} elseif ($this->pushedValue == 'AC') {
						$this->stackValue = 0;
						$this->displayValue = 0;
						$this->status = '';
					}
				} elseif (mb_strlen($this->displayValue) >= $this->maxLength) {
					$this->isError = '';
					return;
				} elseif ($this->category == 'special') {

					if ($this->pushedValue == 'bs') {
						$length = mb_strlen($this->displayValue);

						if ($length > 1) {
							$this->displayValue = mb_substr($this->displayValue, 0, $length - 1);
						} else {
							$this->displayValue = 0;
						}
					} elseif ($this->pushedValue == 'abs') {
						if ($this->displayValue >= 0) {
							$this->displayValue = $this->displayValue - ($this->displayValue * 2);
						} else {
							$this->displayValue = abs($this->displayValue);
						}
					}


				} elseif ($this->category == 'symbol') {

					if (isset($symbols[$this->pushedValue])) {
						echo 'aaaaa';
						$this->status = $symbols[$this->pushedValue];

						$this->stackValue = $this->displayValue;
						$this->isPushedBeforeSymbol = 1;
					} else {
						if ($this->status == '+') {
							$this->displayValue = $this->stackValue + $this->displayValue;
						} elseif ($this->status == '-') {
							$this->displayValue = $this->stackValue - $this->displayValue;
						} elseif ($this->status == '*') {
							$this->displayValue = $this->stackValue * $this->displayValue;
						} elseif ($this->status == '/') {
							$this->displayValue = $this->stackValue / $this->displayValue;
						}
						$this->stackValue = 0;
					}


				} else {
					//numberの場合
					if ($this->displayValue !== 0) {
						$this->displayValue .= $this->pushedValue;
					} else {
						$this->displayValue = $this->pushedValue;
					}

					if (!empty($this->isPushedBeforeSymbol)) {
						$this->displayValue = $this->pushedValue;
						$this->isPushedBeforeSymbol = 0;
					}
				}
			}
		}

	}



}

$calc = new Calc();

$calc->main();
