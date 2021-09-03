<?php

namespace App\Form;

use App\Entity\Vente;
use App\Entity\Client;
use App\Entity\Produit;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class VenteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantite')
            ->add('modePaie', ChoiceType::class, [
                'choices' => [
                    'Espece'=> false,
                    'Cheque'=> false,
                ],
                'placeholder'=> 'Selectionnez Le Mode De paiement'
            ])
            ->add('produit', EntityType::class, [
                // looks for choices from this entity
                'class' => Produit::class,
                'label' => 'Produit',
          // uses the category name property as the visible option string
                'choice_label' => 'nom',
                'placeholder'=> 'Selectionnez Le Produit'
                   // 'onchange' => 'showUser(this.value);'

            ])
                ->add('client', EntityType::class, [
                    // looks for choices from this entity
                    'class' => Client::class,
                    'label' => 'Client',
                    'placeholder'=> 'Selectionnez Un Client',
              // uses the category name property as the visible option string
                    'choice_label' => 'nom',])
                    ->add('prix_u')
        ;




                }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vente::class,
        ]);
    }
}
