<?php

    use eminmuhammadi\HideMyData\HideMyData;
    use PHPUnit\Framework\TestCase;

    class HideMyDataTest extends TestCase
    {
        protected $HideMyDataTest;

        /**
         * @throws Exception
         */
        public function setUp() : void
        {

            $this->HideMyDataTest = new HideMyData('public-key','secret-key','aes256');
        }

        /**
         * @throws Exception
         * @test
         */
        public function TestEncrypt()
        {
            $this->assertEquals('KzdOWXBBWDNWSElWWm1VUkprenBFZz09',$this->HideMyDataTest->encrypt('HideMyData'));
        }

        /**
         * @throws Exception
         * @test
         */
        public function TestDecrypt()
        {
            $this->assertEquals('HideMyData',$this->HideMyDataTest->decrypt('KzdOWXBBWDNWSElWWm1VUkprenBFZz09'));
        }

        /**
         * @throws Exception
         * @test
         */
        public function TestArrayDecrypt()
        {
            $this->assertEquals(['a','b','c'],$this->HideMyDataTest->ArrayDecrypt('Ky9iMk9VNzUxWW52VHZjaDRtTUZ4T0VlU21NRjU3TkZpSjNUNUFzQXpHdXB6enlMZDdsTCtRUk5ZUm1tbHBLL3djK0NYSWQyTFRlMVBYeHBsWEZoT2c9PQ=='));
        }

        /**
         * @throws Exception
         * @test
         */
        public function TestArrayEncrypt()
        {
            $this->assertEquals('Ky9iMk9VNzUxWW52VHZjaDRtTUZ4T0VlU21NRjU3TkZpSjNUNUFzQXpHdXB6enlMZDdsTCtRUk5ZUm1tbHBLL3djK0NYSWQyTFRlMVBYeHBsWEZoT2c9PQ==',$this->HideMyDataTest->ArrayEncrypt(['a','b','c']));
        }

        /**
         * @throws Exception
         * @test
         */
        public function TimeValidationTest()
        {

            $this->assertEquals('HideMyData',$this->HideMyDataTest->decrypt($this->HideMyDataTest->encrypt('HideMyData','1 minute'),'1 minute'));
        }
    }