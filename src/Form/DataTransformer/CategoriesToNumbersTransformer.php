<?php

// src/Form/DataTransformer/CategoriesToNumbersTransformer.php
namespace App\Form\DataTransformer;

use App\Entity\Credit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class CategoriesToNumbersTransformer implements DataTransformerInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    /**
     * Transforms the numeric array (1,2,3,4) to a collection of Categories (Categories[])
     * 
     * @param Array|null $categories
     * @return array
     */
    public function transform($categoriesNumber): array
    {
        $result = [];
        
        if (null === $categoriesNumber) {
            return $result;
        }
        
        return $this->entityManager
            ->getRepository(Credit::class)
            ->findBy(["id" => $categoriesNumber])
        ;
    }

    /**
     * In this case, the reverseTransform can be empty.
     * 
     * @param type $value
     * @return array
     */
    public function reverseTransform($value): array
    {
        return [];
    }
}