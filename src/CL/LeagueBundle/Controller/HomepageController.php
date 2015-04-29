<?php
namespace CL\LeagueBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class HomepageController extends Controller
{
	public function homepageAction(){
		return $this->render("CLLeagueBundle::homepage.html.twig");
	}
}