<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Degree;
use AppBundle\Entity\Faculty;
use AppBundle\Entity\Post;
use AppBundle\Entity\Rank;
use AppBundle\Entity\Subfaculty;
use AppBundle\Entity\Teacher;
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



        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
