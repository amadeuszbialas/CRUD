<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14.03.17
 * Time: 18:35
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="crud")
 */
class Crud
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $column1;

    /**
     * @ORM\Column(type="string")
     */
    private $column2;

    /**
     * @ORM\Column(type="string")
     */
    private $column3;

    /**
     * @ORM\Column(type="string")
     */
    private $column4;

    /**
     * @return mixed
     */
    public function getColumn1()
    {
        return $this->column1;
    }

    /**
     * @param mixed $column1
     */
    public function setColumn1($column1)
    {
        $this->column1 = $column1;
    }

    /**
     * @return mixed
     */
    public function getColumn2()
    {
        return $this->column2;
    }

    /**
     * @param mixed $column2
     */
    public function setColumn2($column2)
    {
        $this->column2 = $column2;
    }

    /**
     * @return mixed
     */
    public function getColumn3()
    {
        return $this->column3;
    }

    /**
     * @param mixed $column3
     */
    public function setColumn3($column3)
    {
        $this->column3 = $column3;
    }

    /**
     * @return mixed
     */
    public function getColumn4()
    {
        return $this->column4;
    }

    /**
     * @param mixed $column4
     */
    public function setColumn4($column4)
    {
        $this->column4 = $column4;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



}