<?php

include '../vendor/autoload.php';

class Outsourcing
{
    protected $dictionarySkills = ['php', 'html', 'css', 'javascript', 'jquery', 'symfony'];

    public function readPDF()
    {
        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile('../CV/CV.pdf');
        return $pdf->getText();
    }

    public function findApplicantSkill($dictionarySkills) //find the list of skills in the CV and return it
    {
        $applicantSkill = array();
        $pdf = readPDF();
        $pdf = strtolower($pdf);
        for ($i = 0; $i < count($dictionarySkills); $i++) {
            if (strpos($pdf, $dictionarySkills[$i])) {
                array_push($applicantSkill, $dictionarySkills[$i]);
            }
        }
        return $applicantSkill;
    }

    public function findJobAdvert($dictionarySkills)
    {
        $requiredSkillsForJobAdvert = file('../jobadvert.txt');
        $applicantSkills = findApplicantSkill($dictionarySkills);
        $matchingRate = array();
        for ($i = 0; $i < count($requiredSkillsForJobAdvert); $i++) {
            $score = 0;
            for ($j = 0; $j < count($applicantSkills); $j++) {
                if (strpos($requiredSkillsForJobAdvert[$i], $applicantSkills[$j])) {
                    $score++;
                }
            }
            $numberOfSkillsRequiredForAJob = count(explode(',', $requiredSkillsForJobAdvert[$i])) - 1;
            echo "The score is : " . $score . "<br>";
            echo "The number of total skills is " . $numberOfSkillsRequiredForAJob . "<br>";
            $matchingRate[$i] = [substr($requiredSkillsForJobAdvert[$i], 0, 1) => $score / $numberOfSkillsRequiredForAJob];
            echo "The matching rate is " . $score / $numberOfSkillsRequiredForAJob . "<br><br>";
        }
        $bestJobAdvert = array();
        foreach ($matchingRate as $index => $value) {
            foreach ($value as $jobAdvert => $matchingScore) {
                if ($matchingScore > 0.8) {
                    array_push($bestJobAdvert, $jobAdvert);
                }
            }
        }
        return $bestJobAdvert;
    }
}