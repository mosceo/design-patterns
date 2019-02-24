State Pattern
=============

Purpose
-------
An object has internal state. When its state changes the object's behaviour changes. When it happens the object appears
to be of a different class. This pattern resembles a finite-state machine implementation.

Implementation
--------------

Class `Context` can be in different states. A context object keeps a reference to its current state object.
All concrete state classes implement the same interface `State`. All state objects keep a reference
to a context object to make calls on it. The context object delegates all method calls to its current state.
These calls can lead to a state change which changes the context behaviour.

Usually `Context` and all concrete `State` implementations all know about each other and highly coupled.
To change state a new state object is created and set on the context object. Usually it's done by the current state object.
State objects can also be kept in the context's static variables as an optimization to avoid object creation.

Examples
--------

A gumball machine can be implemented as a set of *states*: no coin, has coin, gumball sold, out of gumballs,
and a set of *actions*: insert coin, eject coin, turn crank. Certain actions called on certain states can lead
to a state change. A gumball machine is the context that can be in different states.

When the phone is unlocked, pressing buttons leads to executing various functions.
When the phone is locked, pressing any button leads to the unlock screen.
When the phone’s charge is low, pressing any button shows the charging screen.

Run
---
```
> php ./__test.php
```
