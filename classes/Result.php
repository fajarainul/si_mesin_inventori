<?php

    class Result{
        var $message;
        var $isSuccess;

        /**
         * @return mixed
         */
        public function getMessage()
        {
            return $this->message;
        }

        /**
         * @param mixed $message
         */
        public function setMessage($message)
        {
            $this->message = $message;
        }

        /**
         * @return mixed
         */
        public function getisSuccess()
        {
            return $this->isSuccess;
        }

        /**
         * @param mixed $isSuccess
         */
        public function setIsSuccess($isSuccess)
        {
            $this->isSuccess = $isSuccess;
        }


    }

?>