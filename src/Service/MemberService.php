<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Member;
use App\Repository\MemberRepository;

class MemberService
{
    public function __construct(
        private readonly MemberRepository $memberRepository,
    ) {
    }

    public function getAllMembers(): array
    {
        return $this->memberRepository->findAll();
    }

    public function createMember(Member $member): Member
    {
        $this->memberRepository->save($member);

        return $member;
    }
}
