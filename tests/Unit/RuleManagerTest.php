<?php


namespace nimaebrazi\LaravelValidator\Test\Unit;

use nimaebrazi\LaravelValidator\Test\TestCase;
use nimaebrazi\LaravelValidator\Validator\RuleManager;


class RuleManagerTest extends TestCase
{
    /** @test */
    public function it_make_single_validation_rule_string_without_pipe()
    {
        $rule = (new RuleManager())->required()->make();

        $this->assertEquals('required', $rule);
    }

    /** @test */
    public function it_make_validation_rules_that_trim_start_and_end_of_string_with_pipe()
    {
        $rules = (new RuleManager())->required()->array()->make();

        $this->assertEquals('required|array', $rules);
    }

    /** @test */
    public function it_reset_rule_items_by_empty_collection()
    {
        $manager = (new RuleManager())->required()->min(3);
        $manager->resetRules();

        $this->assertEquals('', $manager->make());
    }

    protected function makeValidator($data, $rules)
    {
        return \Validator::make($data, $rules);
    }
}