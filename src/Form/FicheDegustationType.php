<?php

namespace App\Form;

use App\Entity\FicheDegustation;
use App\Entity\Vin;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class FicheDegustationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('couleur', ChoiceType::class, [
            'choices' => [
                'Framboise' => 'framboise',
                'Cerise' => 'cerise',
                'Rubis' => 'rubis',
                'Pourpre' => 'pourpre',
                'Violet' => 'violet',
                'Grenat' => 'grenat',
                'Tuilé' => 'tuilé',
            ],
            'choice_attr' => function ($choice) {
                $colors = [
                    'framboise' => [
                        'value' => 'framboise',
                        'class' => 'checkbox-framboise',
                    ],
                    'cerise' => [
                        'value' => 'cerise',
                        'class' => 'checkbox-cerise',
                    ],
                    'rubis' => [
                        'value' => 'rubis',
                        'class' => 'checkbox-rubis',
                    ],
                    'pourpre' => [
                        'value' => 'pourpre',
                        'class' => 'checkbox-pourpre',
                    ],
                    'violet' => [
                        'value' => 'violet',
                        'class' => 'checkbox-violet',
                    ],
                    'grenat' => [
                        'value' => 'grenat',
                        'class' => 'checkbox-grenat',
                    ],
                    'tuilé' => [
                        'value' => 'tuilé',
                        'class' => 'checkbox-tuilé',
                    ],
                ];
                return ['class' => $colors[$choice]['class']];
            },
            'required' => true,
            'expanded' => true,
        ])

        ->add('fluidite', ChoiceType::class, [
            'choices' => [
                'Visqueuse' => 'visqueuse',
                'Grasse' => 'grasse',
                'Épaisse' => 'epaisse',
                'Coulante' => 'coulante',
                'Fluide' => 'fluide',
            ],
            'required' => true,
            'expanded' => true,
        ])

            ->add('arome', ChoiceType::class, [
                'choices' => [
                    'Floral' => [
                        'Chèvrefeuille' => 'Chèvrefeuille',
                        'Fleur d\'oranger' => 'Fleur d\'oranger',
                        'Violette' => 'Violette',
                        'Rose' => 'Rose',
                        'Acacia' => 'Acacia',
                        'Tilleul' => 'Tilleul',
                        'Jasmin' => 'Jasmin',
                        'Camomille' => 'Camomille',
                        'Foin' => 'Foin',
                        'Herbe Coupée' => 'Herbe',
                    ],
                    'Fruité' => [
                        'Pêche-abricot' => 'Pêche-abricot',
                        'Cerise' => 'Cerise',
                        'Prune' => 'Prune',
                        'Olive verte' => 'Olive verte',
                        'Framboise' => 'Framboise',
                        'Mûre' => 'Mûre',
                        'Fraise' => 'Fraise',
                        'Cassis' => 'Cassis',
                        'Poire' => 'Poire',
                        'Pomme' => 'Pomme',
                    ],

                    'Animal' => [
                        'Musc' => 'Musc',
                        'Cuir' => 'Cuir',
                        'Fourrure' => 'Fourrure',
                    ],

                    'Végétal' => [
                        'Foin' => 'Foin',
                        'Herbe coupée' => 'Herbe coupée',
                        'Thym' => 'Thym',
                        'Humus' => 'Humus',
                        'Champignon' => 'Champignon',
                        'Terre' => 'Terre',
                        'Ecorce' => 'Ecorce',
                        'Résine' => 'Résine',
                        'Santal' => 'Santal',
                        'Chêne' => 'Chêne',
                    ],


                    'Épicé' => [
                        'Canelle' => 'Canelle',
                        'Poivre' => 'Poivre',
                        'Curry' => 'Curry',
                        'Safran' => 'Safran',
                    ],

                    'Marin' => [
                        'Algue' => 'Algue',
                        'Iode' => 'Iode',
                    ],

                ],
                'required' => true,
                'multiple' => true,
                'expanded' => true,

            ])

            ->add('structure', ChoiceType::class, [
                'choices' => [
                    'Légère' => 'legere',
                    'Fluide' => 'fluide',
                    'Charpentée' => 'charpente',
                ],
                'required' => true,
                'expanded' => true,
            ])


            ->add('matiere', ChoiceType::class, [
                'choices' => [
                    'Massive' => 'massive',
                    'Étoffée' => 'etoffee',
                    'Légère' => 'legere',
                    'Fluette' => 'fluette',
                ],
                'required' => true,
                'expanded' => true,
            ])

            ->add('emotion', ChoiceType::class, [
                'choices' => [
                    'Joie' => 'joie',
                    'Satisfaction' => 'satisfaction',
                    'Étonnement' => 'etonnement',
                    'Ennui' => 'ennui',
                    'Dégout' => 'degout',
                ],
                'required' => true,
                'expanded' => true,
            ])

            ->add('note', ChoiceType::class, [
                'choices' => [
                    '0/10' => 0,
                    '1/10' => 1,
                    '2/10' => 2,
                    '3/10' => 3,
                    '4/10' => 4,
                    '5/10' => 5,
                    '6/10' => 6,
                    '7/10' => 7,
                    '8/10' => 8,
                    '9/10' => 9,
                    '10/10' => 10,
                ],
                'required' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FicheDegustation::class,
        ]);
    }
}
