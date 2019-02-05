TemplateMethod Pattern
======================

Purpose
-------

We can define a skeleton of an algorithm in a base class and let subclasses redefine certain steps.
Usually some methods must be defined in subclasses, but others are optional. These optional methods
provide a way to hook into the algorithm and change it. These methods are often called *hooks*.
