<?php

namespace App\Controller;

use App\Entity\Member;
use App\Form\MemberFormType;
use App\Service\MemberService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MembersController extends AbstractController
{
    public function __construct(
        private readonly MemberService $memberService,
    ) {
    }

    #[Route('/members', name: 'app_members')]
    public function listMembers(): JsonResponse
    {
        return $this->json([
            'members' => $this->memberService->getAllMembers(),
        ]);
    }

    #[Route('/members/member', name: 'create_member', methods: ['POST'])]
    public function createMember(Request $request): JsonResponse
    {
        $member = new Member();

        $form = $this->createForm(MemberFormType::class, $member);
        $form->submit($request->getPayload()->all());

        if (! $form->isValid()) {
            //dd($form->getErrors(true));
            return $this->json('Invalid member values', Response::HTTP_BAD_REQUEST);
        }

        $member = $this->memberService->createMember($member);

        return $this->json([
            'member' => $member,
        ]);
    }
}
