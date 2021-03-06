<?php

use Laracasts\TestDummy\Factory;

class ProjectsControllerTest extends TestCase {

    public function testIndex()
    {
        $projects = Factory::times(2)->create('Project');

        $this->action('GET', 'ProjectsController@index');

        $this->assertResponseOk();
        $this->assertViewIs('projects.index');
        $this->assertViewHas('projects');
    }

    public function testShow()
    {
        $project = Factory::create('Project', ['slug' => 'foo']);

        $this->action('GET', 'ProjectsController@show', 'foo');

        $this->assertResponseOk();
        $this->assertViewIs('projects.show');
        $this->assertViewHas('project');
    }

}
