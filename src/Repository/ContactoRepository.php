<?php

namespace App\Repository;

use App\Entity\Contacto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Contacto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contacto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contacto[]    findAll()
 * @method Contacto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contacto::class);
    }

    public function FiltroPersonal(){
        return $this->getEntityManager()
        ->createQuery("
        SELECT contacto.id, contacto.Nombre, contacto.Apellidos, contacto.Telefono , contacto.Tipo 
        From App:Contacto contacto WHERE contacto.Tipo='personal'
        ");
    }
    public function FiltroProfesional(){
        return $this->getEntityManager()
        ->createQuery("
        SELECT contacto.id, contacto.Nombre, contacto.Apellidos, contacto.Telefono , contacto.Tipo 
        From App:Contacto contacto WHERE contacto.Tipo='profesional'
        ");
    }
    public function Dato($id){
        return $this->getEntityManager()
        ->createQuery("
        SELECT contacto.Nombre, contacto.Apellidos, contacto.Direccion, contacto.Piso, contacto.Email, contacto.Telefono , contacto.Tipo 
        From App:Contacto contacto WHERE contacto.id=$id
        ");
    }
    public function borrar($id){
        return $this->getEntityManager()
        ->createQuery("
        DELETE from contacto where id=$id;
        ");
    }

    // /**
    //  * @return Contacto[] Returns an array of Contacto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Contacto
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
