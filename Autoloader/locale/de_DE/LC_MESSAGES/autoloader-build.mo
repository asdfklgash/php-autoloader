��          ,      <       P      Q   M  W     �                     USAGE Project-Id-Version: Autoloader 1.12
Report-Msgid-Bugs-To: Markus Malkusch <markus@malkusch.de>
POT-Creation-Date: 2011-05-22 23:38+0100
PO-Revision-Date: 2011-05-22 23:03+0100
Last-Translator: Markus Malkusch <markus@malkusch.de>
Language: de
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
 %s -c <classpath> {-c <classpath>} [-d <deploypath] [-r]

-c, --classpath=KP  Sucht nach Klassen im Klassenpfad KP. Man kann mehrere
                    Klassenpfade hinzufügen indem man jeweils eine weitere
                    Option --classpath angibt.
-d, --deploypath=DP Liefert den erzeugten Index und den Autoloader in dem
                    Verzeichnis DP aus.
-r, --require       Autoloading wird nicht verwendet. Alle Klassen aus dem
                    erzeugten Index werden über require_once eingebunden. 