# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

History prior to `10.0.0` is not tracked here, since that release was a full rewrite from scratch.

## [Unreleased]

## [10.1.0] - 2026-07-18

### Added

- `BVP\Prefecture\Region` facade class (`Region::from()` / `fromNumber()` / `fromName()`), mirroring the existing `Prefecture` facade for region lookups.
- `Prefecture` and `Region` enums now implement `JsonSerializable`, so `json_encode()` returns the same shape as `toArray()`.

### Changed

- Region name variants (`region_name`, `region_short_name`, etc.) are now sourced from a single `regions.php` resource file instead of being duplicated across all 47 prefecture rows; `Prefecture::toArray()`'s output shape is unchanged.
- `toArray()` and `fromName()` lookups are now memoized internally, avoiding a resource file re-read and linear scan on every call.

### Deprecated

- `Prefecture::fromRegion()`, `fromRegionNumber()`, and `fromRegionName()` in favor of the new `Region` class above. They still work but will be removed in the next major version.

### Fixed

- `Prefecture::fromName()` / `Region::fromName()` failed to match English names differing only in case (e.g. `'Aomori'`, `'AOMORI'`); English name matching is now case-insensitive.

## [10.0.0] - 2026-07-07

### Added

- Initial release following a full rewrite of the library.

[Unreleased]: https://github.com/boatracevibeproject/prefecture/compare/10.1.0...HEAD
[10.1.0]: https://github.com/boatracevibeproject/prefecture/compare/10.0.0...10.1.0
[10.0.0]: https://github.com/boatracevibeproject/prefecture/releases/tag/10.0.0
