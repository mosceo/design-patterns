Facade Pattern
==============

Purpose
-------

If the client code has to work with a complex subsystem consisting of many objects, you can use the Facade Pattern to create a simple interface to this subsystem. For example, instead of calling methods on many objects the client code can call one method on a facade object and this method will do all the job. The facade doesn't encapsulate the subsystem comepletely, the subsystem is still there to be used.

This pattern helps us to enforce a design principle that is called *The Principle of Least Knowledge*. This principle says that any object should interact with the least number of classes (its immediate friends).