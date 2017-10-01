# TimezoneOptions

~~~
TimezoneOptions::generate();

/*
Generates results indexed in several ways:

Array
(
    [regions] => Array
        (
            [Africa] => Array
                (
                    [Africa/Abidjan] => Abidjan
                    [Africa/Accra] => Accra
					...
                )

            [America] => Array
                (
                    [America/Adak] => Adak
                    [America/Anchorage] => Anchorage
					...
                )
			...
        )

    [time] => Array
        (
            [00:28] => Array
                (
                    [Asia/Rangoon] => Rangoon
                    [Indian/Cocos] => Cocos
					...
                )

            [00:58] => Array
                (
                    [Antarctica/Davis] => Davis
                    [Asia/Bangkok] => Bangkok
					...
                )

			...
			
            [13:58] => Array
                (
                    [America/Anguilla] => Anguilla
                    [America/Antigua] => Antigua
					...
                )
			...

        )

    [offset] => Array
        (
			...

            [-04:00] => Array
                (
                    [America/Anguilla] => Anguilla
                    [America/Antigua] => Antigua
					...
                )
			...

            [+02:00] => Array
                (
                    [Africa/Blantyre] => Blantyre
                    [Africa/Bujumbura] => Bujumbura
					...
                )
			...

        )

)
/*
~~~