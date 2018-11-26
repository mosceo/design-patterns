Command Pattern
===============

The Command Pattern encapsulates a request as an object and allows to decouple an object sending a request for an action from an object that performs the action. It supports undoable operations and complex request consisting of different requests.

**Invoker** is an object that send a request. **Receiver** is the object that receives the request and performs the action. We decouple these two using a **Command** object. This way Invoker deals only with Commands and only call `execute()` method on them, each Command calls methods on Receiver which does real stuff.

**NullCommand** is a command that does nothing. This way we can avoid testing if some slot on a Receiver doesn't have an associated Command. We simply attach NullCommand to this slot. It can be a pattern by itself and often called **Null Object Pattern**.
