Peridot 
========

[![Build Status](https://travis-ci.org/peridot-php/peridot.png)](https://travis-ci.org/peridot-php/peridot) [![HHVM Status](http://hhvm.h4cc.de/badge/peridot-php/peridot.svg)](http://hhvm.h4cc.de/package/peridot-php/peridot)

The highly extensible, highly enjoyable, PHP testing framework.

Read more at [peridot-php.github.io](http://peridot-php.github.io/).

##Building PHAR

Peridot's phar is built using [Box](http://box-project.org/). Once box is installed, the phar can be built using
the following command from the project directory:

```
box build
```

##Generating Peridot's documentation

Peridot API documentation is generated using [apigen](https://github.com/apigen/apigen). Once apigen is installed, run
the following command from the project directory:

```
apigen generate
```

This will output documentation to the docs/ directory.

##Running Peridot's tests

Peridot's test suite can be run using Peridot:

```
$ bin/peridot specs/
```

And a sample of output:

![Peridot output sample](https://raw.github.com/peridot-php/peridot/master/output-sample.png "Peridot output sample")

##Release

We use [Robo](https://github.com/Codegyre/Robo) for releases.

```
robo release [version] [site-path]
```
