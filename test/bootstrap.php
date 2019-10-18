<?php

    use eminmuhammadi\HideMyAss\HideMyAss;
    use PHPUnit\Framework\TestCase;

    class HideMyAssTest extends TestCase
    {
        protected $HideMyAssTest;

        /**
         * @throws Exception
         */
        public function setUp() : void
        {

            $this->HideMyAssTest = new HideMyAss('public-key','secret-key','aes256');
        }

        /**
         * @throws Exception
         * @test
         */
        public function TestEncrypt()
        {
            $this->assertEquals('MG9DS3BtaUZjN3ZtR3Rkekx3Sm1LQT09',$this->HideMyAssTest->encrypt('HideMyAss'));
        }

        /**
         * @throws Exception
         * @test
         */
        public function TestDecrypt()
        {
            $this->assertEquals('HideMyAss',$this->HideMyAssTest->decrypt('MG9DS3BtaUZjN3ZtR3Rkekx3Sm1LQT09'));
        }

        /**
         * @throws Exception
         * @test
         */
        public function TimeValidationTest()
        {

            $this->assertEquals('HideMyAss',$this->HideMyAssTest->decrypt($this->HideMyAssTest->encrypt('HideMyAss','1 minute'),'1 minute'));
        }
    }