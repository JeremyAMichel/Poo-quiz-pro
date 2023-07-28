<?php

class QuizFactory
{
    private QcmRepository $qcmRepo;
    private AnswerRepository $answerRepo;
    private QuestionRepository $questionRepo;

    public function __construct(repositoryInterface $qcmRepo, repositoryInterface $answerRepo, repositoryInterface $questionRepo)
    {
        $this->setQcmRepo($qcmRepo);
        $this->setAnswerRepo($answerRepo);
        $this->setQuestionRepo($questionRepo);
    }

    /**
     * Set the value of qcmRepo
     *
     * @return  self
     */
    public function setQcmRepo(repositoryInterface $qcmRepo): self
    {
        $this->qcmRepo = $qcmRepo;

        return $this;
    }

    /**
     * Set the value of answerRepo
     *
     * @return  self
     */
    public function setAnswerRepo(repositoryInterface $answerRepo): self
    {
        $this->answerRepo = $answerRepo;

        return $this;
    }

    /**
     * Set the value of questionRepo
     *
     * @return  self
     */
    public function setQuestionRepo(repositoryInterface $questionRepo): self
    {
        $this->questionRepo = $questionRepo;

        return $this;
    }

    private function getQcmData(int $id_qcm): array
    {
        $qcmData = $this->qcmRepo->findAllById($id_qcm);
        return $qcmData;
    }

    private function getQuestionsData(int $id_qcm): array
    {
        $questionsData = $this->questionRepo->findAllById($id_qcm);
        return $questionsData;
    }

    private function getAnswersData(int $id_question): array
    {
        $answersData = $this->answerRepo->findAllById($id_question);
        return $answersData;
    }

    /**
     * 
     */
    private function createObjectQcm(array $qcmData, array $questions)
    {
        return new Qcm($qcmData, $questions);
    }

    /**
     * 
     */
    private function createObjectQuestion(array $questionData, array $answers)
    {

        $questions = new Question($questionData, $answers);


        return $questions;
    }

    /**
     * D
     */
    private function createObjectAnswer(array $answerData)
    {
        $answers = new Answer($answerData);
        return $answers;
    }


    /**
     * Make a full quiz 
     */
    public function makeQuiz($id_qcm): Qcm
    {
        $qcmData = $this->getQcmData($id_qcm);
        $questionsData = $this->getQuestionsData($id_qcm);
        $allQuestions = [];
        foreach ($questionsData as $questionData) {
            $allAnswers = [];

            foreach ($this->getAnswersData($questionData['id_question']) as $answerData) {
                $allAnswers[] = $this->createObjectAnswer($answerData);
            } 

            $allQuestions[] = $this->createObjectQuestion($questionData, $allAnswers);
            
        }

        $qcm = $this->createObjectQcm($qcmData, $allQuestions);
        return $qcm;
    }
}
