Adapter Pattern
===============

##Purpose

Sometimes an object has one interface, but the client code expects another interface. We can wrap this object and build around it the interface the client code expects. This wrapper is called an adapter. An adapter translates one interface to another.

Some actions of the old interface can't be translated properly and we have to lose data. Some actions can't be translated at all. In this case an exception can be thrown.
