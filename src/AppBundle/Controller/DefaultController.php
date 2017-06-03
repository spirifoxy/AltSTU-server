<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Building;
use AppBundle\Entity\Degree;
use AppBundle\Entity\Educform;
use AppBundle\Entity\Faculty;
use AppBundle\Entity\StudyGroup;
use AppBundle\Entity\Post;
use AppBundle\Entity\Rank;
use AppBundle\Entity\Room;
use AppBundle\Entity\Roomtype;
use AppBundle\Entity\Semester;
use AppBundle\Entity\Speciality;
use AppBundle\Entity\Subfaculty;
use AppBundle\Entity\Teacher;
use AppBundle\Entity\Timetable;
use AppBundle\Entity\Typelesson;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();//->get('doctrine')->getManager();

        $tool = new \Doctrine\ORM\Tools\SchemaTool($em);
        $classes = array(
            $em->getClassMetadata('AppBundle:Building'),
            $em->getClassMetadata('AppBundle:Degree'),
            $em->getClassMetadata('AppBundle:Educform'),
            $em->getClassMetadata('AppBundle:Faculty'),
            $em->getClassMetadata('AppBundle:StudyGroup'),
            $em->getClassMetadata('AppBundle:Post'),
            $em->getClassMetadata('AppBundle:Rank'),
            $em->getClassMetadata('AppBundle:Room'),
            $em->getClassMetadata('AppBundle:Roomtype'),
            $em->getClassMetadata('AppBundle:Semester'),
            $em->getClassMetadata('AppBundle:Speciality'),
            $em->getClassMetadata('AppBundle:Subfaculty'),
            $em->getClassMetadata('AppBundle:Teacher'),
            $em->getClassMetadata('AppBundle:Timetable'),
            $em->getClassMetadata('AppBundle:Typelesson'),
            $em->getClassMetadata('AppBundle:User'),
        );
        $tool->dropSchema($classes);
        $tool->createSchema($classes);
//        exit;

        $rank = new Rank();
        $rank->setRankname('Профессор');
        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($rank);

        $rank = new Rank();
        $rank->setRankname('Доктор тех.наук');
        $em->persist($rank);

        $post = new Post();
        $post->setLongname('Старший преподаватель');
        $post->setShortname('ст.преп.');
        $em->persist($post);

        $post = new Post();
        $post->setLongname('Научный работник');
        $post->setShortname('науч.раб.');
        $em->persist($post);

        $degree = new Degree();
        $degree->setLongdegree('Кандидат технических наук');
        $degree->setShortdegree('к.т.н.');
        $em->persist($degree);

        $teacher = new Teacher();
        $teacher->setName('Иван');
        $teacher->setPatronymic('Иванович');
        $teacher->setSurname('Иванов');
        $teacher->setRank($rank);
        $teacher->setPost($post);
        $teacher->setDegree($degree);
        $em->persist($teacher);

        $faculty = new Faculty();
        $faculty->setFullname('Факультет информационных технологий');
        $faculty->setShortname('ФИТ');
        $em->persist($faculty);

        $subfaculty = new Subfaculty();
        $subfaculty->setLongsubfaculty('Кафедра прикладной математики');
        $subfaculty->setShortsubfaculty('ПМ');
        $subfaculty->setFaculty($faculty);
        $em->persist($subfaculty);
        $em->flush();

        $teacher1 = new Teacher();
        $teacher1->setName('Петр');
        $teacher1->setPatronymic('Петрович');
        $teacher1->setSurname('Петров');
        $teacher1->setRank($em->getRepository('AppBundle:Rank')->findOneBy(array('rankname' => 'Профессор')));
        $teacher1->setPost($post);
        $teacher1->setDegree($degree);
        $teacher1->setSubfaculty($subfaculty);
        $em->persist($teacher1);

        $roomtype = new Roomtype();
        $roomtype->setType("Лекционная");
        $em->persist($roomtype);

        $roomtype1 = new Roomtype();
        $roomtype1->setType("Стандартная");
        $em->persist($roomtype1);

        $building1 = new Building();
        $building1->setName("ГК");
        $em->persist($building1);
        $building2 = new Building();
        $building2->setName("В");
        $em->persist($building2);
        $building3 = new Building();
        $building3->setName("ПК");
        $em->persist($building3);
        $building4 = new Building();
        $building4->setName("Н");
        $em->persist($building4);
        $building5 = new Building();
        $building5->setName("Д");
        $em->persist($building5);

        $room1 = new Room();
        $room1->setRoomtype($roomtype);
        $room1->setBuilding($building1);
        $room1->setCapacity(30);
        $room1->setNumber("110");
        $em->persist($room1);

        $room2 = new Room();
        $room2->setRoomtype($roomtype);
        $room2->setBuilding($building2);
        $room2->setCapacity(100);
        $room2->setNumber("120");
        $em->persist($room2);

        $room3 = new Room();
        $room3->setRoomtype($roomtype1);
        $room3->setBuilding($building3);
        $room3->setCapacity(100);
        $room3->setNumber("405");
        $em->persist($room3);

        $typeLesson = new Typelesson();
        $typeLesson->setType("Лекция");
        $typeLesson->setTypeshort("л.");
        $em->persist($typeLesson);

        $typeLesson = new Typelesson();
        $typeLesson->setType("Практика");
        $typeLesson->setTypeshort("пр.");
        $em->persist($typeLesson);

        $typeLesson = new Typelesson();
        $typeLesson->setType("Лабораторная работа");
        $typeLesson->setTypeshort("л.р.");
        $em->persist($typeLesson);

        $semester = new Semester();
        $semester->setName("First");
        $semester->setBegindate(new \DateTime("01.09.2008"));
        $semester->setEnddate(new \DateTime("24.01.2009"));
        $semester->setBeginbreak(new \DateTime("28.12.2008"));
        $semester->setEndbreak(new \DateTime("10.01.2009"));
        $semester->setBeginsession(new \DateTime("11.01.2009"));
        $semester->setEndsession(new \DateTime("24.01.2009"));
        $semester->setIsactive(true);
        $semester->setLastweeknumber(17);
        $em->persist($semester);

        $semester = new Semester();
        $semester->setName("Second");
        $semester->setBegindate(new \DateTime("01.02.2009"));
        $semester->setEnddate(new \DateTime("24.06.2009"));
        $semester->setBeginbreak(new \DateTime("30.05.2008"));
        $semester->setEndbreak(new \DateTime("06.06.2009"));
        $semester->setBeginsession(new \DateTime("07.06.2009"));
        $semester->setEndsession(new \DateTime("20.06.2009"));
        $semester->setIsactive(false);
        $semester->setLastweeknumber(17);
        $em->persist($semester);

        $eduform = new Educform();
        $eduform->setFormname("Очная");
        $em->persist($eduform);
        $eduform->setFormname("Заочная");
        $em->persist($eduform);
        $teacher = new Teacher();

        $speciality = new Speciality();
        $speciality->setShortspeciality("ПИ");
        $speciality->setLongspeciality("Програмнная инженерия");
        $em->persist($speciality);

        $speciality = new Speciality();
        $speciality->setShortspeciality("ИБ");
        $speciality->setLongspeciality("Информационная безопасность");
        $em->persist($speciality);

        //добавить факультет и кафедру
        $group = new StudyGroup();
        $group->setName1("PI");
        $group->setName2("31");
        $group->setIddaynight(0);
        $group->setPeoplecount(25);
        $group->setEducform($eduform);
        $group->setFaculty($faculty);
        $group->setSubfaculty($subfaculty);
        $group->setSemester($semester);
        $group->setSpeciality($speciality);
        $em->persist($group);

        $group1 = new StudyGroup();
        $group1->setName1("IB");
        $group1->setName2("21");
        $group1->setIddaynight(0);
        $group1->setPeoplecount(20);
        $group1->setEducform($eduform);
        $group1->setFaculty($faculty);
        $group1->setSubfaculty($subfaculty);
        $group1->setSemester($semester);
        $group1->setSpeciality($speciality);
        $em->persist($group1);

        $timetable = new Timetable();
        $timetable->setRoom($room1);
        $timetable->setSemester($semester);
        $timetable->setStudygroup($group);
        $timetable->setTeacher($teacher1);
        $timetable->setTypelesson($typeLesson);
        $timetable->setBegindatetime(new \Datetime('2017-06-05 8:15'));
        $em->persist($timetable);

        $timetable = new Timetable();
        $timetable->setRoom($room1);
        $timetable->setSemester($semester);
        $timetable->setStudygroup($group);
        $timetable->setTeacher($teacher1);
        $timetable->setTypelesson($em->getRepository('AppBundle:Typelesson')->find(1));
        $timetable->setBegindatetime(new \Datetime('2017-06-05 9:55'));
        $em->persist($timetable);

        $timetable = new Timetable();
        $timetable->setRoom($room1);
        $timetable->setSemester($semester);
        $timetable->setStudygroup($group);
        $timetable->setTeacher($teacher1);
        $timetable->setTypelesson($em->getRepository('AppBundle:Typelesson')->find(1));
        $timetable->setBegindatetime(new \Datetime('2017-06-05 11:35'));
        $em->persist($timetable);



        $timetable = new Timetable();
        $timetable->setRoom($room1);
        $timetable->setSemester($semester);
        $timetable->setStudygroup($group);
        $timetable->setTeacher($teacher1);
        $timetable->setTypelesson($em->getRepository('AppBundle:Typelesson')->find(2));
        $timetable->setBegindatetime(new \Datetime('2017-06-05 9:55'));
        $em->persist($timetable);

        $timetable = new Timetable();
        $timetable->setRoom($room2);
        $timetable->setSemester($semester);
        $timetable->setStudygroup($group);
        $timetable->setTeacher($em->getRepository('AppBundle:Teacher')->findOneBy(array('surname' => 'Иванов')));
        $timetable->setTypelesson($em->getRepository('AppBundle:Typelesson')->find(2));
        $timetable->setBegindatetime(new \Datetime('2017-06-06 11:35'));
        $em->persist($timetable);

        $timetable = new Timetable();
        $timetable->setRoom($room3);
        $timetable->setSemester($semester);
        $timetable->setStudygroup($group);
        $timetable->setTeacher($em->getRepository('AppBundle:Teacher')->findOneBy(array('surname' => 'Иванов')));
        $timetable->setTypelesson($typeLesson);
        $timetable->setBegindatetime(new \Datetime('2017-06-06 13:35'));
        $em->persist($timetable);




        //для другой группы
        $timetable = new Timetable();
        $timetable->setRoom($room1);
        $timetable->setSemester($semester);
        $timetable->setStudygroup($group1);
        $timetable->setTeacher($teacher1);
        $timetable->setTypelesson($em->getRepository('AppBundle:Typelesson')->find(2));
        $timetable->setBegindatetime(new \Datetime('2017-06-05 9:55'));
        $em->persist($timetable);

        $timetable = new Timetable();
        $timetable->setRoom($room2);
        $timetable->setSemester($semester);
        $timetable->setStudygroup($group1);
        $timetable->setTeacher($em->getRepository('AppBundle:Teacher')->findOneBy(array('surname' => 'Иванов')));
        $timetable->setTypelesson($em->getRepository('AppBundle:Typelesson')->find(2));
        $timetable->setBegindatetime(new \Datetime('2017-06-06 11:35'));
        $em->persist($timetable);

        $timetable = new Timetable();
        $timetable->setRoom($room3);
        $timetable->setSemester($semester);
        $timetable->setStudygroup($group1);
        $timetable->setTeacher($em->getRepository('AppBundle:Teacher')->findOneBy(array('surname' => 'Иванов')));
        $timetable->setTypelesson($typeLesson);
        $timetable->setBegindatetime(new \Datetime('2017-06-06 13:35'));
        $em->persist($timetable);


        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
