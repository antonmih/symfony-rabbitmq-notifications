<?php

declare(strict_types=1);

namespace App\UI\Controller\Message\Validation;

use App\Domain\Entity\ValueObject\MessageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\PositiveOrZero;

class MessageValidationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('content', TextType::class, [
            'constraints' => [new NotBlank()],
        ]);
        $builder->add('type', ChoiceType::class, [
            'choices' => MessageType::AVAILABLE_TYPES,
        ]);
        $builder->add('user_id', IntegerType::class);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'csrf_protection' => false,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'form';
    }
}