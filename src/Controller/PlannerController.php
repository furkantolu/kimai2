<?php

/*
 * This file is part of the Kimai time-tracking app.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller used to display calendars.
 *
 * @Route(path="/planner")
 * @Security("is_granted('IS_AUTHENTICATED_REMEMBERED')")
 */
class PlannerController extends AbstractController
{
    /**
     * @Route(path="/", defaults={"page": 1}, name="planner", methods={"GET"})
     * @Security("is_granted('view_own_timesheet')")
     *
     * @param int $page
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        return $this->render('planner/index.html.twig');
        //return $this->index($page, $request, 'timesheet/index.html.twig', TimesheetMetaDisplayEvent::TIMESHEET);
    }
}

