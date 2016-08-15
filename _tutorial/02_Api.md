# Api 


## Pre & Post Filter

Damit mit einer Api-Klasse auch direkt per HTTP kommuniziert werden kann,
muss normalerweise zumindest ein Teil der Nachricht gesondert
deserialisiert werden.

Über 

```
api.<name>.httpInputFilter
```
Können die Parameter gefilter werden.

Über

```
api.<name>.httpOutputFilter
```

Kann die Ausgabe wieder serialisiert werden.

Die normalen Filter könne, wie auch bei anderen Teilen über

```

```