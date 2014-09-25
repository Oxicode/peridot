<?php

describe('Context', function() {

    beforeEach(function() {
        $reflection = new ReflectionClass('Peridot\Runner\Context');
        $context = $reflection->newInstanceWithoutConstructor();
        $construct = $reflection->getConstructor();
        $construct->setAccessible(true);
        $construct->invoke($context);
        $this->context = $context;
    });

    describe('->describe()', function() {
        it("should allow nesting of suites", function() {
            $context = $this->context;
            $child = null;
            $parent = $context->describe('Parent suite', function() use ($context, &$child) {
                $child = $context->describe('Child suite', function() use ($context) {
                });
            });
            $specs = $parent->getSpecs();
            assert($specs[0] === $child, "child should have been added to parent");
        });

        it("should allow sibling suites", function() {
            $sibling1 = $this->context->describe('Sibling1 suite', function() {});
            $sibling2 = $this->context->describe('Sibling2 suite', function() {});
            $specs = $this->context->getCurrentSuite()->getSpecs();
            assert($specs[0] === $sibling1, "sibling1 should have been added to parent");
            assert($specs[1] === $sibling2, "sibling2 should have been added to parent");
        });

        it("should set pending if value is not null", function() {
            $suite = $this->context->describe("desc", function() {}, true);
            assert($suite->isPending(), "suite should be pending");
        });

        it("should ignore pending if value is null", function() {
            $suite = $this->context->describe("desc", function() {});
            assert(is_null($suite->isPending()), "pending status should be null");
        });
    });
});
