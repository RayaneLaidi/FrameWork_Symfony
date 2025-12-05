<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom du produit'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => false,
            ])
            ->add('prix', NumberType::class, [
                'label' => 'Prix (€)',
                'scale' => 2,
                'html5' => true,
            ])
            ->add('quantite', IntegerType::class, [
                'label' => 'Quantité en stock'
            ])
            ->add('categorie', EntityType::class, [
    'class' => Categorie::class,
    'choice_label' => 'nom',  // Maintenant ça marchera grâce à __toString()
    'label' => 'Catégorie',
    'placeholder' => 'Choisir une catégorie',
    'required' => false,
])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}