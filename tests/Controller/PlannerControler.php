<?php

/*
 * This file is part of the Kimai time-tracking app.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests\Controller;

use App\Entity\User;

/**
 * @group integration
 */
class PlannerControllerTest extends ControllerBaseTest
{
    public function testPlannerIsSecure()
    {
        $this->assertUrlIsSecured('/planner');
        $this->assertUrlIsSecuredForRole(User::ROLE_ADMIN, '/planner');
    }

    public function testIndexAction()
    {
        $client = $this->getClientForAuthenticatedUser(User::ROLE_SUPER_ADMIN);
        $this->assertAccessIsGranted($client, '/planner');

        $result = $client->getCrawler()->filter('.content .box-header');
        $this->assertEquals(7, count($result));
    }
}
