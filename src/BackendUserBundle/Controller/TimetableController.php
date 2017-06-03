<?php

namespace BackendUserBundle\Controller;

use AppBundle\Entity\Timetable;
use AppBundle\Repository\TimetableRepository;
use DateTime;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class TimetableController
 * @package BackendUserBundle\Controller
 */
class TimetableController extends FOSRestController
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @View(serializerGroups={"timetable"})
     */
    public function getTimetablesAllAction()
    {
        $timetables = $this->getDoctrine()->getRepository('AppBundle:Timetable')->findAll();

        $view = $this->view($timetables, 200);
        return $this->handleView($view);
    }


    /**
     * @param $groupName
     * @param $groupNumber
     * @param $currentDate
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Rest\Get("/timetable/{groupName}/{groupNumber}/week/{currentDate}")
     *
     * @View(serializerGroups={"timetable"})
     */
    public function getTimetableWeeksAction($groupName, $groupNumber, $currentDate)
    {
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();

        $group = $this->getDoctrine()->getRepository('AppBundle:StudyGroup')->findOneBy(array('name1' => $groupName, 'name2' => $groupNumber));
//        $timetable = $this->getDoctrine()->getRepository('AppBundle:Timetable')->findBy(array('studygroup' => $group));

        $now = new DateTime($currentDate);
        $tomorrow = $now->modify('+1 day'); //если сегодня - понедельник, то нужно, чтобы вывелась следующая неделя, а не предыдущая

        $monday = strtotime('last monday', strtotime($tomorrow->format('Y-m-d')));
        $sunday = strtotime('next sunday', $monday);
        $nextSunday = $sunday + 60 * 60 * 24 * 7;

        $weekStart = date('Y-m-d', $monday);
        $secondWeekEnd = date('Y-m-d', $nextSunday);


        $qb->select('t')
            ->from('AppBundle\Entity\Timetable','t')
            ->where(
                $qb->expr()->andX(
                    $qb->expr()->between(
                        't.begindatetime',
                        ':from',
                        ':to'
                    ),
                    $qb->expr()->eq(
                        't.studygroup',
                        ':group')
                )
            )
            ->setParameters(array('from' => $weekStart, 'to' => $secondWeekEnd, 'group' => $group));

        $timetable = $qb->getQuery()->getResult();

        /*dump( $qb->getQuery());
        dump($timetable);
        exit;*/

        $view = $this->view($timetable, 200);
        return $this->handleView($view);
    }
}