<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Building;
use AppBundle\Entity\Degree;
use AppBundle\Entity\Educform;
use AppBundle\Entity\Faculty;
use AppBundle\Entity\Group;
use AppBundle\Entity\Post;
use AppBundle\Entity\Rank;
use AppBundle\Entity\Room;
use AppBundle\Entity\Roomtype;
use AppBundle\Entity\Semester;
use AppBundle\Entity\Speciality;
use AppBundle\Entity\Subfaculty;
use AppBundle\Entity\Teacher;
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
            $em->getClassMetadata('AppBundle:Group'),
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

        $rank->setRankname('Доктор тех.наук');
        $em->persist($rank);

        $post = new Post();
        $post->setLongname('Старший преподаватель');
        $post->setShortname('ст.преп.');
        $em->persist($post);

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

        $teacher->setName('Петр');
        $teacher->setPatronymic('Петрович');
        $teacher->setSurname('Петров');
        $teacher->setRank($em->getRepository('AppBundle:Rank')->findOneBy(array('rankname' => 'Профессор')));
        $teacher->setPost($post);
        $teacher->setDegree($degree);
        $teacher->setSubfaculty($subfaculty);
        $em->persist($teacher);

        $roomtype = new Roomtype();

        $roomtype->setType("Лекционная");
        $em->persist($roomtype);
        $roomtype->setType("Стандартная");
        $em->persist($roomtype);

        $building = new Building();

        $building->setName("ГК");
        $em->persist($building);
        $building->setName("В");
        $em->persist($building);
        $building->setName("ПК");
        $em->persist($building);
        $building->setName("Н");
        $em->persist($building);
        $building->setName("Д");
        $em->persist($building);

        $room = new Room();

        $room->setRoomtype($roomtype);
        $room->setBuilding($building);
        $room->setCapacity(30);
        $room->setNumber("110");
        $em->persist($room);

        $room->setRoomtype($roomtype);
        $room->setBuilding($building);
        $room->setCapacity(100);
        $room->setNumber("120");
        $em->persist($room);

        $roomtype->setType("Лекционная");
        $building->setName("ПК");
        $room->setRoomtype($roomtype);
        $room->setBuilding($building);
        $room->setCapacity(100);
        $room->setNumber("405");
        $em->persist($room);

        $typeLesson = new Typelesson();

        $typeLesson->setType("Лекция");
        $typeLesson->setTypeshort("л.");
        $em->persist($typeLesson);

        $typeLesson->setType("Практика");
        $typeLesson->setTypeshort("пр.");
        $em->persist($typeLesson);

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
        $speciality->setShortspeciality("ИБ");
        $speciality->setLongspeciality("Информационная безопасность");
        $em->persist($speciality);

        //добавить факультет и кафедру
        $group = new Group();
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

        $group->setName1("IB");
        $group->setName2("21");
        $group->setIddaynight(0);
        $group->setPeoplecount(20);
        $group->setEducform($eduform);
        $group->setFaculty($faculty);
        $group->setSubfaculty($subfaculty);
        $group->setSemester($semester);
        $group->setSpeciality($speciality);
        $em->persist($group);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
