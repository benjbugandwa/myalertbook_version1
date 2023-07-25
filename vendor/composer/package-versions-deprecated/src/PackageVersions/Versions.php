<?php

declare(strict_types=1);

namespace PackageVersions;

use Composer\InstalledVersions;
use OutOfBoundsException;

class_exists(InstalledVersions::class);

/**
 * This class is generated by composer/package-versions-deprecated, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 *
 * @deprecated in favor of the Composer\InstalledVersions class provided by Composer 2. Require composer-runtime-api:^2 to ensure it is present.
 */
final class Versions
{
    /**
     * @deprecated please use {@see self::rootPackageName()} instead.
     *             This constant will be removed in version 2.0.0.
     */
    const ROOT_PACKAGE_NAME = 'phpmyadmin/phpmyadmin';

    /**
     * Array of all available composer packages.
     * Dont read this array from your calling code, but use the \PackageVersions\Versions::getVersion() method instead.
     *
     * @var array<string, string>
     * @internal
     */
    const VERSIONS          = array (
  'composer/ca-bundle' => '1.3.6@90d087e988ff194065333d16bc5cf649872d9cdb',
  'ezyang/htmlpurifier' => 'v4.16.0@523407fb06eb9e5f3d59889b3978d5bfe94299c8',
  'fig/http-message-util' => '1.1.5@9d94dc0154230ac39e5bf89398b324a86f63f765',
  'google/recaptcha' => '1.3.0@d59a801e98a4e9174814a6d71bbc268dff1202df',
  'maennchen/zipstream-php' => '3.0.2@b46726e666b5d2ad32959ae9492ee1034e798162',
  'markbaker/complex' => '3.0.2@95c56caa1cf5c766ad6d65b6344b807c1e8405b9',
  'markbaker/matrix' => '3.0.1@728434227fe21be27ff6d86621a1b13107a2562c',
  'nikic/fast-route' => 'v1.3.0@181d480e08d9476e61381e04a71b34dc0432e812',
  'paragonie/random_compat' => 'v9.99.100@996434e5492cb4c3edcb9168db6fbb1359ef965a',
  'paragonie/sodium_compat' => 'v1.20.0@e592a3e06d1fa0d43988c7c7d9948ca836f644b6',
  'phpmailer/phpmailer' => 'v6.8.0@df16b615e371d81fb79e506277faea67a1be18f1',
  'phpmyadmin/motranslator' => '5.3.0@87baa97809ec556c40e4cba4bdef998a2de2a003',
  'phpmyadmin/shapefile' => '3.0.1@c232198ef49d3484f26acfe2d12cab103da9371a',
  'phpmyadmin/sql-parser' => '5.8.0@db1b3069b5dbc220d393d67ff911e0ae76732755',
  'phpmyadmin/twig-i18n-extension' => 'v4.0.1@c0d0dd171cd1c7733bf152fd44b61055843df052',
  'phpoffice/phpspreadsheet' => '1.29.0@fde2ccf55eaef7e86021ff1acce26479160a0fa0',
  'psr/cache' => '3.0.0@aa5030cfa5405eccfdcb1083ce040c2cb8d253bf',
  'psr/container' => '1.1.2@513e0666f7216c7459170d56df27dfcefe1689ea',
  'psr/http-client' => '1.0.2@0955afe48220520692d2d09f7ab7e0f93ffd6a31',
  'psr/http-factory' => '1.0.2@e616d01114759c4c489f93b099585439f795fe35',
  'psr/http-message' => '1.1@cb6ce4845ce34a8ad9e68117c10ee90a29919eba',
  'psr/log' => '1.1.4@d49695b909c3b7628b6289db5479a1c204601f11',
  'psr/simple-cache' => '3.0.0@764e0b3939f5ca87cb904f570ef9be2d78a07865',
  'ralouphie/getallheaders' => '3.0.3@120b605dfeb996808c31b6477290a714d356e822',
  'slim/psr7' => '1.6.1@72d2b2bac94ab4575d369f605dbfafbe168d3163',
  'symfony/cache' => 'v6.3.0@357bf04b1380f71e40b2d6592dbf7f2a948ca6b1',
  'symfony/cache-contracts' => 'v3.3.0@ad945640ccc0ae6e208bcea7d7de4b39b569896b',
  'symfony/config' => 'v5.4.21@2a6b1111d038adfa15d52c0871e540f3b352d1e4',
  'symfony/dependency-injection' => 'v5.4.24@4645e032d0963fb614969398ca28e47605b1a7da',
  'symfony/deprecation-contracts' => 'v3.3.0@7c3aff79d10325257a001fcf92d991f24fc967cf',
  'symfony/expression-language' => 'v5.4.21@501589522b844b8eecf012c133f0404f0eef77ac',
  'symfony/filesystem' => 'v6.3.0@97b698e1d77d356304def77a8d0cd73090b359ea',
  'symfony/polyfill-ctype' => 'v1.27.0@5bbc823adecdae860bb64756d639ecfec17b050a',
  'symfony/polyfill-mbstring' => 'v1.27.0@8ad114f6b39e2c98a8b0e3bd907732c207c2b534',
  'symfony/polyfill-php80' => 'v1.27.0@7a6ff3f1959bb01aefccb463a0f2cd3d3d2fd936',
  'symfony/polyfill-php81' => 'v1.27.0@707403074c8ea6e2edaf8794b0157a0bfa52157a',
  'symfony/service-contracts' => 'v2.5.2@4b426aac47d6427cc1a1d0f7e2ac724627f5966c',
  'symfony/var-exporter' => 'v6.3.0@db5416d04269f2827d8c54331ba4cfa42620d350',
  'twig/twig' => 'v3.6.1@7e7d5839d4bec168dfeef0ac66d5c5a2edbabffd',
  'webmozart/assert' => '1.11.0@11cb2199493b2f8a3b53e7f19068fc6aac760991',
  'williamdes/mariadb-mysql-kbs' => 'v1.2.14@d829a96ad07d79065fbc818a3bd01f2266c3890b',
  'amphp/amp' => 'v2.6.2@9d5100cebffa729aaffecd3ad25dc5aeea4f13bb',
  'amphp/byte-stream' => 'v1.8.1@acbd8002b3536485c997c4e019206b3f10ca15bd',
  'bacon/bacon-qr-code' => '2.0.8@8674e51bb65af933a5ffaf1c308a660387c35c22',
  'beberlei/assert' => 'v3.3.2@cb70015c04be1baee6f5f5c953703347c0ac1655',
  'brick/math' => '0.9.3@ca57d18f028f84f777b2168cd1911b0dee2343ae',
  'code-lts/u2f-php-server' => 'v1.2.1@6931a00f5feb0d923ea28d3e4816272536f45077',
  'composer/package-versions-deprecated' => '1.11.99.5@b4f54f74ef3453349c24a845d22392cd31e65f1d',
  'composer/pcre' => '3.1.0@4bff79ddd77851fe3cdd11616ed3f92841ba5bd2',
  'composer/semver' => '3.3.2@3953f23262f2bff1919fc82183ad9acb13ff62c9',
  'composer/xdebug-handler' => '3.0.3@ced299686f41dce890debac69273b47ffe98a40c',
  'dasprid/enum' => '1.0.4@8e6b6ea76eabbf19ea2bf5b67b98e1860474012f',
  'dealerdirect/phpcodesniffer-composer-installer' => 'v0.7.2@1c968e542d8843d7cd71de3c5c9c3ff3ad71a1db',
  'dnoegel/php-xdg-base-dir' => 'v0.1.1@8f8a6e48c5ecb0f991c2fdcf5f154a47d85f9ffd',
  'doctrine/coding-standard' => '9.0.2@35a2452c6025cb739c3244b3348bcd1604df07d1',
  'doctrine/deprecations' => 'v1.1.1@612a3ee5ab0d5dd97b7cf3874a6efe24325efac3',
  'doctrine/instantiator' => '2.0.0@c6222283fa3f4ac679f8b9ced9a4e23f163e80d0',
  'felixfbecker/advanced-json-rpc' => 'v3.2.1@b5f37dbff9a8ad360ca341f3240dc1c168b45447',
  'felixfbecker/language-server-protocol' => 'v1.5.2@6e82196ffd7c62f7794d778ca52b69feec9f2842',
  'fgrosse/phpasn1' => 'v2.5.0@42060ed45344789fb9f21f9f1864fc47b9e3507b',
  'league/uri' => '6.8.0@a700b4656e4c54371b799ac61e300ab25a2d1d39',
  'league/uri-interfaces' => '2.3.0@00e7e2943f76d8cb50c7dfdc2f6dee356e15e383',
  'myclabs/deep-copy' => '1.11.1@7284c22080590fb39f2ffa3e9057f10a4ddd0e0c',
  'netresearch/jsonmapper' => 'v4.2.0@f60565f8c0566a31acf06884cdaa591867ecc956',
  'nikic/php-parser' => 'v4.15.5@11e2663a5bc9db5d714eedb4277ee300403b4a9e',
  'openlss/lib-array2xml' => '1.0.0@a91f18a8dfc69ffabe5f9b068bc39bb202c81d90',
  'paragonie/constant_time_encoding' => 'v2.6.3@58c3f47f650c94ec05a151692652a868995d2938',
  'phar-io/manifest' => '2.0.3@97803eca37d319dfa7826cc2437fc020857acb53',
  'phar-io/version' => '3.2.1@4f7fd7836c6f332bb2933569e566a0d6c4cbed74',
  'php-webdriver/webdriver' => '1.14.0@3ea4f924afb43056bf9c630509e657d951608563',
  'phpdocumentor/reflection-common' => '2.2.0@1d01c49d4ed62f25aa84a747ad35d5a16924662b',
  'phpdocumentor/reflection-docblock' => '5.3.0@622548b623e81ca6d78b721c5e029f4ce664f170',
  'phpdocumentor/type-resolver' => '1.7.2@b2fe4d22a5426f38e014855322200b97b5362c0d',
  'phpmyadmin/coding-standard' => '3.0.0@d187e307c91518ce676ee91a81145dcc90b25d9f',
  'phpstan/extension-installer' => '1.3.1@f45734bfb9984c6c56c4486b71230355f066a58a',
  'phpstan/phpdoc-parser' => '1.22.0@ec58baf7b3c7f1c81b3b00617c953249fb8cf30c',
  'phpstan/phpstan' => '1.10.19@af5a296ff02610c1bfb4ddfac9fd4a08657b9046',
  'phpstan/phpstan-phpunit' => '1.3.13@d8bdab0218c5eb0964338d24a8511b65e9c94fa5',
  'phpstan/phpstan-webmozart-assert' => '1.2.4@d1ff28697bd4e1c9ef5d3f871367ce9092871fec',
  'phpunit/php-code-coverage' => '9.2.26@443bc6912c9bd5b409254a40f4b0f4ced7c80ea1',
  'phpunit/php-file-iterator' => '3.0.6@cf1c2e7c203ac650e352f4cc675a7021e7d1b3cf',
  'phpunit/php-invoker' => '3.1.1@5a10147d0aaf65b58940a0b72f71c9ac0423cc67',
  'phpunit/php-text-template' => '2.0.4@5da5f67fc95621df9ff4c4e5a84d6a8a2acf7c28',
  'phpunit/php-timer' => '5.0.3@5a63ce20ed1b5bf577850e2c4e87f4aa902afbd2',
  'phpunit/phpunit' => '9.6.9@a9aceaf20a682aeacf28d582654a1670d8826778',
  'pragmarx/google2fa' => 'v8.0.1@80c3d801b31fe165f8fe99ea085e0a37834e1be3',
  'pragmarx/google2fa-qrcode' => 'v2.1.1@0459a5d7bab06b11a09a365288d41a41d2afe63f',
  'psalm/plugin-phpunit' => '0.16.1@5dd3be04f37a857d52880ef6af2524a441dfef24',
  'ramsey/collection' => '2.0.0@a4b48764bfbb8f3a6a4d1aeb1a35bb5e9ecac4a5',
  'ramsey/uuid' => '4.7.4@60a4c63ab724854332900504274f6150ff26d286',
  'roave/security-advisories' => 'dev-latest@f928c4960ce91bfd266db27fa15679341cd3525d',
  'sebastian/cli-parser' => '1.0.1@442e7c7e687e42adc03470c7b668bc4b2402c0b2',
  'sebastian/code-unit' => '1.0.8@1fc9f64c0927627ef78ba436c9b17d967e68e120',
  'sebastian/code-unit-reverse-lookup' => '2.0.3@ac91f01ccec49fb77bdc6fd1e548bc70f7faa3e5',
  'sebastian/comparator' => '4.0.8@fa0f136dd2334583309d32b62544682ee972b51a',
  'sebastian/complexity' => '2.0.2@739b35e53379900cc9ac327b2147867b8b6efd88',
  'sebastian/diff' => '4.0.5@74be17022044ebaaecfdf0c5cd504fc9cd5a7131',
  'sebastian/environment' => '5.1.5@830c43a844f1f8d5b7a1f6d6076b784454d8b7ed',
  'sebastian/exporter' => '4.0.5@ac230ed27f0f98f597c8a2b6eb7ac563af5e5b9d',
  'sebastian/global-state' => '5.0.5@0ca8db5a5fc9c8646244e629625ac486fa286bf2',
  'sebastian/lines-of-code' => '1.0.3@c1c2e997aa3146983ed888ad08b15470a2e22ecc',
  'sebastian/object-enumerator' => '4.0.4@5c9eeac41b290a3712d88851518825ad78f45c71',
  'sebastian/object-reflector' => '2.0.4@b4f479ebdbf63ac605d183ece17d8d7fe49c15c7',
  'sebastian/recursion-context' => '4.0.5@e75bd0f07204fec2a0af9b0f3cfe97d05f92efc1',
  'sebastian/resource-operations' => '3.0.3@0f4443cb3a1d92ce809899753bc0d5d5a8dd19a8',
  'sebastian/type' => '3.2.1@75e2c2a32f5e0b3aef905b9ed0b179b953b3d7c7',
  'sebastian/version' => '3.0.2@c6c1022351a901512170118436c764e473f6de8c',
  'slevomat/coding-standard' => '7.2.1@aff06ae7a84e4534bf6f821dc982a93a5d477c90',
  'spomky-labs/base64url' => 'v2.0.4@7752ce931ec285da4ed1f4c5aa27e45e097be61d',
  'spomky-labs/cbor-php' => 'v2.1.0@28e2712cfc0b48fae661a48ffc6896d7abe83684',
  'squizlabs/php_codesniffer' => '3.6.2@5e4e71592f69da17871dba6e80dd51bce74a351a',
  'symfony/console' => 'v5.4.24@560fc3ed7a43e6d30ea94a07d77f9a60b8ed0fb8',
  'symfony/polyfill-intl-grapheme' => 'v1.27.0@511a08c03c1960e08a883f4cffcacd219b758354',
  'symfony/polyfill-intl-normalizer' => 'v1.27.0@19bd1e4fcd5b91116f14d8533c57831ed00571b6',
  'symfony/polyfill-php73' => 'v1.27.0@9e8ecb5f92152187c4799efd3c96b78ccab18ff9',
  'symfony/process' => 'v5.4.24@e3c46cc5689c8782944274bb30702106ecbe3b64',
  'symfony/string' => 'v6.3.0@f2e190ee75ff0f5eced645ec0be5c66fac81f51f',
  'tecnickcom/tcpdf' => '6.6.2@e3cffc9bcbc76e89e167e9eb0bbda0cab7518459',
  'thecodingmachine/safe' => 'v1.3.3@a8ab0876305a4cdaef31b2350fcb9811b5608dbc',
  'theseer/tokenizer' => '1.2.1@34a41e998c2183e22995f158c581e7b5e755ab9e',
  'vimeo/psalm' => '4.30.0@d0bc6e25d89f649e4f36a534f330f8bb4643dd69',
  'web-auth/cose-lib' => 'v3.3.12@efa6ec2ba4e840bc1316a493973c9916028afeeb',
  'web-auth/metadata-service' => 'v3.3.12@ef40d2b7b68c4964247d13fab52e2fa8dbd65246',
  'web-auth/webauthn-lib' => 'v3.3.12@5ef9b21c8e9f8a817e524ac93290d08a9f065b33',
  'webmozart/path-util' => '2.3.0@d939f7edc24c9a1bb9c0dee5cb05d8e859490725',
  'phpmyadmin/phpmyadmin' => '5.2.1@',
);

    private function __construct()
    {
    }

    /**
     * @psalm-pure
     *
     * @psalm-suppress ImpureMethodCall we know that {@see InstalledVersions} interaction does not
     *                                  cause any side effects here.
     */
    public static function rootPackageName() : string
    {
        if (!self::composer2ApiUsable()) {
            return self::ROOT_PACKAGE_NAME;
        }

        return InstalledVersions::getRootPackage()['name'];
    }

    /**
     * @throws OutOfBoundsException If a version cannot be located.
     *
     * @psalm-param key-of<self::VERSIONS> $packageName
     * @psalm-pure
     *
     * @psalm-suppress ImpureMethodCall we know that {@see InstalledVersions} interaction does not
     *                                  cause any side effects here.
     */
    public static function getVersion(string $packageName): string
    {
        if (self::composer2ApiUsable()) {
            return InstalledVersions::getPrettyVersion($packageName)
                . '@' . InstalledVersions::getReference($packageName);
        }

        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }

    private static function composer2ApiUsable(): bool
    {
        if (!class_exists(InstalledVersions::class, false)) {
            return false;
        }

        if (method_exists(InstalledVersions::class, 'getAllRawData')) {
            $rawData = InstalledVersions::getAllRawData();
            if (count($rawData) === 1 && count($rawData[0]) === 0) {
                return false;
            }
        } else {
            $rawData = InstalledVersions::getRawData();
            if ($rawData === null || $rawData === []) {
                return false;
            }
        }

        return true;
    }
}
